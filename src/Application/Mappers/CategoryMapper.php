<?php

declare(strict_types=1);

namespace TaskManager\Application\Mappers;

use TaskManager\Domain\Model\Entities\Category;
use TaskManager\Infrastructure\Persistence\Eloquent\EloquentCategoriesModel;

final class CategoryMapper
{
    public static function fromEloquent(EloquentCategoriesModel $eloquentCategoriesModel):Category
    {
        return new Category(
            id: $eloquentCategoriesModel->id,
            name: $eloquentCategoriesModel->name,
            visible: $eloquentCategoriesModel->visible
        );
    }
}
