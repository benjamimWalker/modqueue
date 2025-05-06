<?php

namespace App\Http\Controllers;

use App\Actions\StoreContent;
use App\Http\Requests\ContentRequest;
use App\Jobs\ModerateContentJob;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{
    public function __construct(private readonly StoreContent $storeContent)
    {
    }

    public function store(ContentRequest $request): JsonResponse
    {
        $data = $this->storeContent->handle($request->validated());
        ModerateContentJob::dispatch($data->toArray());

        return response()->json($data, Response::HTTP_CREATED);
    }
}
