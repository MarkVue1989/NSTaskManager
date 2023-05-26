<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use TaskManager\Application\UseCases\CreateTask;
use TaskManager\Application\UseCases\GetTasks;

class CreateTaskController extends Controller
{
    public function __invoke(Request $request,CreateTask $createTask):JsonResponse
    {
        try{
        $response = $createTask($request->task["name"], $request->categories);
        return response()->json(['data' => $response->toArray()],201);
        }catch (QueryException $exception) {
            return response()->json(['data' => "Error $exception"],400);
        } catch (ModelNotFoundException $exception){
            $id = $exception->getIds()[0];
            return response()->json(['data' => "Error: no se ha encontrado la categoria con id $id"],404);
        }
    }
}
