<?php

namespace ModWorker\Factories;

use ModWorker\Services\PurgomalumService;
use ModWorker\Contracts\ContentModerationService;

class ModerationStrategyFactory
{
    public static function make(): ContentModerationService
    {
        return new PurgomalumService();
    }
}
