<?php

declare(strict_types=1);

namespace TaskManager\Infrastructure\Persistence\Repositories;

use TaskManager\Application\Mappers\CategoryMapper;
use TaskManager\Domain\Contracts\CategoryRepositoryContract;
use TaskManager\Domain\ValueObjects\Categories;
use TaskManager\Infrastructure\Persistence\Eloquent\EloquentCategoriesModel;

final class CategoryRepository implements CategoryRepositoryContract
{
    public function __construct(
        private readonly EloquentCategoriesModel $eloquentCategoriesModel
    )
    {

    }

    public function getCategories():Categories
    {
        $arraycategories = [];
        $categories = $this->eloquentCategoriesModel->get();
        foreach($categories as $category){
            array_push($arraycategories, CategoryMapper::fromEloquent($category));
        }
        return new Categories($arraycategories);
    }
}
