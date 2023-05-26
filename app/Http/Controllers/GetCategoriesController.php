<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use TaskManager\Application\UseCases\GetCategories;

class GetCategoriesController extends Controller
{
    public function __invoke(GetCategories $getCategories):JsonResponse
    {
        $response = $getCategories();
        return response()->json(['data' => $response->toArray()],200);
    }
}
