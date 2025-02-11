<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TranslateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $joblisting) //$job can used but in tutorial it have issues because default class job
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('sended form Translatejob'.$this->joblisting->title.' to english');
    }
}
