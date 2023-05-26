<?php

declare(strict_types=1);

namespace TaskManager\Infrastructure\Persistence\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use TaskManager\Application\Mappers\CategoryMapper;
use TaskManager\Domain\Contracts\TasksCategoriesRepositoryContract;
use TaskManager\Domain\Model\Entities\Category;
use TaskManager\Domain\Model\Entities\Task;
use TaskManager\Domain\ValueObjects\Categories;
use TaskManager\Infrastructure\Persistence\Eloquent\EloquentCategoriesModel;
use TaskManager\Infrastructure\Persistence\Eloquent\EloquentTasksCategoriesModel;

final class TasksCategoriesRepository implements TasksCategoriesRepositoryContract
{
    public function __construct(
        private readonly EloquentCategoriesModel $eloquentCategoriesModel,
        private readonly EloquentTasksCategoriesModel $eloquentTasksCategoriesModel
    )
    {

    }

    public function createTaskCategories(int $idTask, int $idCategory):Category
    {
        try{
            $category = EloquentCategoriesModel::findOrFail($idCategory);
            $this->eloquentTasksCategoriesModel->create([
                'task_id' => $idTask,
                'category_id' => $idCategory
            ]);
            return CategoryMapper::fromEloquent($category);
        }catch (ModelNotFoundException $exception) {
            throw $exception;
        }
    }
}
