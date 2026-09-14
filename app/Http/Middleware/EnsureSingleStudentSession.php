<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class EnsureSingleStudentSession
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('student_logged_in') || !session('student_batch_id')) {
            return redirect()->route('student.login')->with('error', 'Please login first');
        }

        $batchId = session('student_batch_id');
        $sessionToken = session('student_session_token');

        $batch = \App\Models\Batch::find($batchId);
        if (!$batch) {
            session()->forget(['student_logged_in', 'student_batch_id', 'student_username', 'student_exam_name', 'student_session_token']);
            return redirect()->route('student.login')->with('error', 'Please login first');
        }

        // Only enforce single-session if the batch token points to a live session
        $batchSessionId = $batch->active_session_token;
        $hasLiveBatchSession = false;
        if (!empty($batchSessionId)) {
            // Dekhun AllowAdminOrStudent — `payload` (longText) na ene shudhu
            // last_activity ana hoy.
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
}
