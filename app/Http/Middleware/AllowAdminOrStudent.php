<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Batch;
use Illuminate\Support\Facades\DB;

class AllowAdminOrStudent
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }

        if (session('student_logged_in') && session('student_batch_id')) {
            $batchId = session('student_batch_id');
            $sessionToken = session('student_session_token');

            $batch = Batch::find($batchId);
            if (!$batch) {
                session()->forget(['student_logged_in', 'student_batch_id', 'student_username', 'student_exam_name', 'student_session_token']);
                return redirect()->route('student.login')->with('error', 'Please login first');
            }

            // Only enforce single-session if the batch token points to a live session
            $batchSessionId = $batch->active_session_token;
            $hasLiveBatchSession = false;
            if (!empty($batchSessionId)) {
                // Age ->first() kora hoto, tate `payload` (longText) column-o
                // protita request e DB theke uthe asto. Amader shudhu last_activity
                // dorkar, tai sheta-i ana hoy.
                $lastActivity = (int) DB::table(config('session.table', 'sessions'))
                    ->where('id', $batchSessionId)
                    ->value('last_activity');

                if ($lastActivity > 0) {
                    $lifetimeSeconds = ((int) config('session.lifetime', 120)) * 60;
                    $hasLiveBatchSession = (time() - $lastActivity) < $lifetimeSeconds;
                }

                // If stale, clear it so it won't cause false logouts
                if (!$hasLiveBatchSession) {
                    $batch->active_session_token = null;
                    $batch->save();
                    $batchSessionId = null;
                }
            }

            if ($hasLiveBatchSession && $batchSessionId && $sessionToken !== $batchSessionId) {
                session()->forget(['student_logged_in', 'student_batch_id', 'student_username', 'student_exam_name', 'student_session_token']);
                return redirect()->route('student.login')->with('error', 'You were logged out because this account was logged in from another device.');
            }

            return $next($request);
        }

        return redirect()->route('student.login')->with('error', 'Please login first');
    }
}
