<?php namespace Gecche\Multidomain\Tests\App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AppNameJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $files = new Filesystem();

        $filename = base_path('queueresult.txt');
        $files->delete($filename);
        $files->append($filename,env('APP_NAME') . " --- " . $this->job->getQueue());
    }
}
