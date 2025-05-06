<?php

namespace ModWorker\Actions;

use ModWorker\Models\ModerationLog;

class StoreModerationLog
{

    public function handle(int $contentId, ?string $moderatorNote, bool $innapropriate): ModerationLog
    {
        return ModerationLog::create([
            'content_id' => $contentId,
            'action' => $innapropriate ? 'rejected' : 'approved',
            'moderator_note' => $moderatorNote
        ]);
    }
}
