<?php

namespace ModWorker\Services;

use ModWorker\Contracts\ContentModerationService;
use ModWorker\Exceptions\ContentModerationException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Log;

class PurgomalumService implements ContentModerationService
{

    /**
     * @throws ContentModerationException|ConnectionException
     */
    public function isInappropriate(string $text): bool
    {
        $response = Http::timeout(3)->get(config('services.purgomalum.url'), [
            'text' => $text
        ])->onError(function (Response $response) {
            Log::error('Purgomalum API error: ' . $response->body());
            throw new ContentModerationException('Purgomalum API request failed.');
        });

        return $response->json();
    }
}
