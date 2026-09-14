<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateAllTestExamNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tests:update-exam-names';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all test submissions (Listening, Reading, Writing) with exam_name from batches';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting to update exam names for all test types...');
        
        $totalUpdated = 0;
        
        // Update Listening submissions
        $this->info('Updating Listening submissions...');
        $listeningSubmissions = \App\Models\Listining::whereNull('exam_name')->get();
        foreach ($listeningSubmissions as $submission) {
            $assignment = \App\Models\TestAssignment::where('test_name', 'LIKE', '%Listening%')
                ->with('batch')
                ->first();
            
            if ($assignment && $assignment->exam_name) {
                $submission->exam_name = $assignment->exam_name;
                $submission->batch_id = $assignment->batch_id;
                $submission->save();
                $totalUpdated++;
            }
        }
        
        // Update Reading submissions
        $this->info('Updating Reading submissions...');
        $readingSubmissions = \App\Models\Reading::whereNull('exam_name')->get();
        foreach ($readingSubmissions as $submission) {
            $assignment = \App\Models\TestAssignment::where('test_name', 'LIKE', '%Reading%')
                ->with('batch')
                ->first();
            
            if ($assignment && $assignment->exam_name) {
                $submission->exam_name = $assignment->exam_name;
                $submission->batch_id = $assignment->batch_id;
                $submission->save();
                $totalUpdated++;
            }
        }
        
        // Update Writing submissions
        $this->info('Updating Writing submissions...');
        $writingSubmissions = \App\Models\Writing::whereNull('exam_name')->get();
        foreach ($writingSubmissions as $submission) {
            $assignment = \App\Models\TestAssignment::where('test_name', 'LIKE', '%Writing%')
                ->with('batch')
                ->first();
            
            if ($assignment && $assignment->exam_name) {
                $submission->exam_name = $assignment->exam_name;
                $submission->batch_id = $assignment->batch_id;
                $submission->save();
                $totalUpdated++;
            }
        }
        
        $this->info("Updated {$totalUpdated} total submissions with exam names.");
        return 0;
    }
}
