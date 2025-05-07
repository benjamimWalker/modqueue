<?php

namespace App\Actions;

use App\Models\ModerationLog;
use Illuminate\Database\Eloquent\Collection;

class ListModerationLog
{
    public function execute(): Collection
    {
        return ModerationLog::all();
    }
}
