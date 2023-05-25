<?php

declare(strict_types=1);

namespace TaskManager\Infrastructure\Persistence\Repositories;

use TaskManager\Application\Mappers\CategoryMapper;
use TaskManager\Application\Mappers\TaskMapper;
use TaskManager\Domain\Contracts\TaskRepositoryContract;
use TaskManager\Domain\Model\Category;
use TaskManager\Domain\ValueObjects\Categories;
use TaskManager\Domain\ValueObjects\Tasks;
use TaskManager\Infrastructure\Persistence\Eloquent\EloquentTasksModel;

final class TaskRepository implements TaskRepositoryContract
{
    public function __construct(
        private readonly EloquentTasksModel $eloquentTaskModel
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
}
