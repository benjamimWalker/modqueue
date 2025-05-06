<?php

namespace ModWorker\Models;

use Illuminate\Database\Eloquent\Model;

class ModerationLog extends Model
{
    protected $fillable = [
        'content_id',
        'action',
        'moderator_note',
    ];
}
