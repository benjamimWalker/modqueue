<?php

use App\Models\Content;

const listendpoint = 'api/content';

it('returns a list of content', function () {
    Content::factory()->create([
        'title' => 'Content 1',
        'body' => 'Body of content 1'
    ]);
    Content::factory()->create([
        'title' => 'Content 2',
        'body' => 'Body of content 2'
    ]);

    $this->getJson(listendpoint)
        ->assertOk()
        ->assertJsonFragment(['title' => 'Content 1'])
        ->assertJsonFragment(['title' => 'Content 2'])
        ->assertJsonFragment(['body' => 'Body of content 1'])
        ->assertJsonFragment(['body' => 'Body of content 2']);
});

it('returns an empty list if no content exists', function () {
    $this->getJson(listendpoint)
        ->assertOk()
        ->assertJsonFragment([]);
});

