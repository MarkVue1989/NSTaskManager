<?php

declare(strict_types=1);

namespace TaskManager\Infrastructure\Persistence\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use TaskManager\Application\Mappers\CategoryMapper;
use TaskManager\Application\Mappers\TaskMapper;
use TaskManager\Domain\Contracts\TaskRepositoryContract;
use TaskManager\Domain\Contracts\TasksCategoriesRepositoryContract;
use TaskManager\Domain\Model\Entities\Task;
use TaskManager\Domain\ValueObjects\Tasks;
use TaskManager\Infrastructure\Persistence\Eloquent\EloquentTasksModel;

final class TaskRepository implements TaskRepositoryContract
{
    public function __construct(
        private readonly EloquentTasksModel $eloquentTaskModel,
        private readonly TasksCategoriesRepositoryContract $tasksCategoriesRepositoryContract
    )
    {

    }

    public function getTasks():Tasks
    {
        $arraytasks = [];
        $tasks = $this->eloquentTaskModel->get();
        foreach($tasks as $task)
        {
            array_push($arraytasks, TaskMapper::fromEloquent($task));
        }
        return new Tasks($arraytasks);
    }

    public function createTask(string $name, array $categories):Task
    {
        try{
            DB::beginTransaction();
            $newTask = EloquentTasksModel::create(['name'=>$name]);
            if($newTask instanceof EloquentTasksModel)
            {
                foreach($categories as $category){
                    $this->tasksCategoriesRepositoryContract->createTaskCategories($newTask->id,$category);
                }
                DB::commit();
                return TaskMapper::fromEloquent($newTask);
            }
            else{
                DB::rollBack();
                return response()->json(['data' => "El formato del objeto de creación de la tarea es incorrecto"],409);
            }
        } catch (QueryException $exception) {
            DB::rollBack();
            return response()->json(['data' => "Error $exception"],400);
        } catch (ModelNotFoundException $exception){
            DB::rollBack();
            return response()->json(['data' => "Error: $exception"],404);
        }
    }
}
