<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use ModWorker\Actions\StoreModerationLog;
use ModWorker\Actions\UpdateContentStatus;
use ModWorker\Factories\ModerationStrategyFactory;

class ModerateContentJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public array $data)
    {
    }

    public function handle(
        StoreModerationLog $storeModerationLog,
        UpdateContentStatus $updateContentStatus
    ): void
    {
        $moderationService = ModerationStrategyFactory::make();
        $inappropriate = $moderationService->isInappropriate($this->data['body']);

        $updateContentStatus->handle($this->data['id'], $inappropriate);
        $storeModerationLog->handle($this->data['id'], null, $inappropriate);
    }
}
