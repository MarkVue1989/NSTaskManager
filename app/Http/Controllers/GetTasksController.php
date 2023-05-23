<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetTasksController extends Controller
{
    public function __invoke():JsonResponse
    {
        return response()->json([],200);
    }
}
