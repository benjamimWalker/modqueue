<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('content', ContentController::class);
