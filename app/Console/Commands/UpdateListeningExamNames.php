<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateListeningExamNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'listening:update-exam-names';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update existing listening submissions with exam_name from batches';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting to update listening exam names...');
        
        $submissions = \App\Models\Listining::whereNull('exam_name')->get();
        $updated = 0;
        
        foreach ($submissions as $submission) {
            // Try to find the batch for this student's test
            $assignment = \App\Models\TestAssignment::where('test_name', 'LIKE', '%Listening%')
                ->with('batch')
                ->first();
            
            if ($assignment && $assignment->exam_name) {
                $submission->exam_name = $assignment->exam_name;
                $submission->batch_id = $assignment->batch_id;
                $submission->save();
                $updated++;
            }
        }
        
        $this->info("Updated {$updated} submissions with exam names.");
        return 0;
    }
}
