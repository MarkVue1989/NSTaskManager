<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use TaskManager\Application\UseCases\CreateTask;
use TaskManager\Application\UseCases\GetTasks;

class CreateTaskController extends Controller
{
    public function __invoke(Request $request,CreateTask $createTask):JsonResponse
    {

        $response = $createTask($request->task["name"], $request->categories);
        return response()->json(['data' => $response->toArray()],200);
    }
}
