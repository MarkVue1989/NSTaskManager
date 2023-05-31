<?php

declare(strict_types=1);

namespace TaskManager\Application\Mappers;

use TaskManager\Domain\Model\Entities\Category;
use TaskManager\Infrastructure\Persistence\Eloquent\EloquentCategoriesModel;

final class CategoryMapper
{
    public static function fromEloquent(EloquentCategoriesModel $eloquentCategoriesModel): Category
    {
        return new Category(
            id: $eloquentCategoriesModel->id,
            name: $eloquentCategoriesModel->name,
            visible: $eloquentCategoriesModel->visible
        );
    }
    /**
     * @param array<integer|string|boolean> $arrayCategory
     */
    public static function fromArray(array $arrayCategory): Category
    {
        return new Category(
            id: $arrayCategory["id"],
            name: $arrayCategory["name"],
            visible: $arrayCategory["visible"]
        );
    }
}
