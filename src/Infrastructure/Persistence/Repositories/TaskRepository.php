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
    ) {
    }

    public function getTasks(): Tasks
    {
        $nuevoArray = [];
        $arraytasks = [];
        $tasks = $this->eloquentTaskModel::select('tasks.id', 'tasks.name as task_name', 'categories.id as category_id', 'categories.name as category_name', 'categories.visible as category_visible')
            ->join('tasks_categories', 'tasks.id', '=', 'tasks_categories.task_id')
            ->join('categories', 'tasks_categories.category_id', '=', 'categories.id')
            ->orderBy('tasks.id')
            ->get();
        foreach ($tasks as $task) {
            $id = $task->id;
            if (!isset($nuevoArray[$id])) {
                $nuevoArray[$id] = [
                    "id" => $id,
                    "task_name" => $task["task_name"],
                    "categories" => []
                ];
            }
            $nuevoArray[$id]["categories"][] = CategoryMapper::fromArray([
                "id" => $task["category_id"],
                "name" => $task["category_name"],
                "visible" => $task["category_visible"] === 1
            ]);
        }
        $nuevoArray = array_values($nuevoArray);
        foreach ($nuevoArray as $task) {
            array_push($arraytasks, TaskMapper::fromArray($task));
        }
        return new Tasks($arraytasks);
    }

    public function createTask(string $name, array $categories): Task
    {
        try {
            DB::beginTransaction();
            $newTask = EloquentTasksModel::create(['name' => $name]);
            if ($newTask instanceof EloquentTasksModel) {
                foreach ($categories as $category) {
                    $this->tasksCategoriesRepositoryContract->createTaskCategories($newTask->id, $category);
                }
                DB::commit();
                return TaskMapper::fromEloquent($newTask);
            } else {
                DB::rollBack();
                return response()->json(['data' => "El formato del objeto de creación de la tarea es incorrecto"], 409);
            }
        } catch (QueryException $exception) {
            DB::rollBack();
            throw $exception;
        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function deleteTask(int $idTask): void
    {
        try {
            $task = $this->eloquentTaskModel->findOrFail($idTask);
            $task->categories()->detach();
            $task->delete();
        } catch (ModelNotFoundException $exception) {
            throw $exception;
        } catch (QueryException $exception) {
            throw $exception;
        }
    }
}
