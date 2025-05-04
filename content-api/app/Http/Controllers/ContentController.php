<?php

namespace App\Http\Controllers;

use App\Actions\StoreContent;
use App\Http\Requests\ContentRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{
    public function __construct(private readonly StoreContent $storeContent)
    {
    }

    public function store(ContentRequest $request): JsonResponse
    {
        return response()->json($this->storeContent->handle($request->validated()), Response::HTTP_CREATED);
    }
}
