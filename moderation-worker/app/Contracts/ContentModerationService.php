<?php

namespace ModWorker\Contracts;

interface ContentModerationService
{
    public function isInappropriate(string $text): bool;
}
