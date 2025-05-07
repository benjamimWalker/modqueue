<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\ModerationLogController;
use Illuminate\Support\Facades\Route;

Route::prefix('content')->group(static function () {
    Route::get('', [ContentController::class, 'index']);
    Route::post('', [ContentController::class, 'store']);
});

Route::get('moderation-logs', [ModerationLogController::class, 'index']);
