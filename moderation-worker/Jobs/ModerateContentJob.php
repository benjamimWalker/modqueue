<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ModerateContentJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public array $data)
    {
    }

    public function handle(): void
    {
        dump($this->data);
    }
}
