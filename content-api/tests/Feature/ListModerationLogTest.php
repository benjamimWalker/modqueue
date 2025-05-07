<?php

use App\Models\ModerationLog;

const modlogendpoint = 'api/moderation-logs';

it('returns a list of moderation logs', function () {
    ModerationLog::factory()->create([
        'content_id' => 1,
        'action' => 'approved',
        'moderator_note' => 'Looks fine'
    ]);
    ModerationLog::factory()->create([
        'content_id' => 2,
        'action' => 'rejected',
        'moderator_note' => 'Contains inappropriate language'
    ]);

    $this->getJson(modlogendpoint)
        ->assertOk()
        ->assertJsonFragment(['content_id' => 1])
        ->assertJsonFragment(['action' => 'approved'])
        ->assertJsonFragment(['moderator_note' => 'Looks fine'])
        ->assertJsonFragment(['content_id' => 2])
        ->assertJsonFragment(['action' => 'rejected'])
        ->assertJsonFragment(['moderator_note' => 'Contains inappropriate language']);
});

it('returns an empty list if no moderation logs exist', function () {
    $this->getJson(modlogendpoint)
        ->assertOk()
        ->assertJsonFragment([]);
});

