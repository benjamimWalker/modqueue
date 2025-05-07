<?php

namespace App\Actions;

use App\Models\Content;
use Illuminate\Database\Eloquent\Collection;

class ListContent
{
    public function handle(): Collection
    {
        return Content::all();
    }
}
