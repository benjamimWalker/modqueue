<?php

namespace ModWorker\Actions;


use ModWorker\Models\Content;

class UpdateContentStatus
{
    public function handle(int $id, bool $inappropriate): bool
    {
        return Content::findOrFail($id)->update([
            'status' => $inappropriate ? 'rejected' : 'approved',
        ]);
    }
}
