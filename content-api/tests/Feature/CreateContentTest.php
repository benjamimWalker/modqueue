<?php
CONST endpoint = 'api/content';

it('creates content with valid title and body', function () {
    $payload = [
        'title' => 'Sample Title',
        'body' => 'This is a valid body text.',
    ];

    $response = $this->postJson(endpoint, $payload);

    $response->assertCreated();
    $this->assertDatabaseHas('contents', $payload);
});

it('creates content without a title (nullable)', function () {
    $payload = [
        'body' => 'Only a body, no title.',
    ];

    $response = $this->postJson(endpoint, $payload);

    $response->assertCreated();
    $this->assertDatabaseHas('contents', $payload);
});

it('fails if body is missing', function () {
    $payload = [
        'title' => 'Missing body field',
    ];

    $response = $this->postJson(endpoint, $payload);

    $response->assertUnprocessable();
    $response->assertJsonValidationErrors(['body']);
});

it('fails if body exceeds 1000 characters', function () {
    $payload = [
        'body' => str_repeat('a', 1001),
    ];

    $response = $this->postJson(endpoint, $payload);

    $response->assertUnprocessable();
    $response->assertJsonValidationErrors(['body']);
});

it('fails if title is not a string', function () {
    $payload = [
        'title' => ['not', 'a', 'string'],
        'body' => 'Valid body',
    ];

    $response = $this->postJson(endpoint, $payload);

    $response->assertUnprocessable();
    $response->assertJsonValidationErrors(['title']);
});

it('fails if body is not a string', function () {
    $payload = [
        'body' => ['array'],
    ];

    $response = $this->postJson(endpoint, $payload);

    $response->assertUnprocessable();
    $response->assertJsonValidationErrors(['body']);
});

