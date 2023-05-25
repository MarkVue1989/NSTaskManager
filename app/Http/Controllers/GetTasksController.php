<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use TaskManager\Application\UseCases\GetTasks;

class GetTasksController extends Controller
{
    public function __invoke(GetTasks $getTasks):JsonResponse
    {
        $response = $getTasks();
        return response()->json(['data' => $response->toArray()],200);
    }
}
