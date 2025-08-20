<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PostCreate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $title = $this->data['title'] ?? 'Untitled';
        $user = $this->data['user'] ?? 'Unknown User';
        $time = $this->data['created_at'] ?? now()->toDateTimeString();

        echo '1New post added "' . $title . '" by ' . $user . ' at ' . $time . PHP_EOL;
        print_r($this->data);
    }
}
