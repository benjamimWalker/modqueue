<?php

namespace App\Http\Controllers;

use App\Actions\ListModerationLog;
use Illuminate\Http\JsonResponse;

class ModerationLogController extends Controller
{
    public function index(ListModerationLog $listModerationLog): JsonResponse
    {
        return response()->json($listModerationLog->execute());
    }
}
