<?php

namespace App\Actions;

use App\Models\Content;

class StoreContent
{
    public function handle(array $data): Content
    {
        return Content::create($data);
    }
}
