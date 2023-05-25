<?php

declare(strict_types=1);

namespace TaskManager\Application\Mappers;

use TaskManager\Domain\Model\Entities\Task;
use TaskManager\Domain\ValueObjects\Categories;
use TaskManager\Infrastructure\Persistence\Eloquent\EloquentTasksModel;

final class TaskMapper
{

    public static function fromEloquent(EloquentTasksModel $eloquentTasksModel):Task
    {
        $arraycategories = [];
        foreach($eloquentTasksModel->categories as $category)
            {
                array_push($arraycategories, CategoryMapper::fromEloquent($category));
            }
        return new Task(
            id: $eloquentTasksModel->id,
            name: $eloquentTasksModel->name,
            categories: new Categories($arraycategories)
        );
    }
}
