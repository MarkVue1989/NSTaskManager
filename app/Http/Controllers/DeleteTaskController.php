<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use TaskManager\Application\UseCases\DeleteTask;

class DeleteTaskController extends Controller
{
    public function __invoke(Request $request,DeleteTask $deleteTask):JsonResponse
    {
        try{
        $id = $request->route('id');
        $deleteTask($id);
        return response()->json(['data' => "La tarea con el id $id has sido eliminada."],200);
        }catch (QueryException $exception) {
            return response()->json(['data' => "Error $exception"],400);
        } catch (ModelNotFoundException $exception){
            $id = $exception->getIds()[0];
            return response()->json(['data' => "Error: no se ha encontrado la tarea con id $id"],404);
        }
    }
}
