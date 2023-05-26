<?php

declare(strict_types=1);

namespace TaskManager\Application\UseCases;

use TaskManager\Domain\Contracts\CategoryRepositoryContract;
use TaskManager\Domain\ValueObjects\Categories;

final class GetCategories
{
    public function __construct(
        private CategoryRepositoryContract $categoryRepositoryContract
    )
    {
    }

    public function __invoke(): Categories
    {
        return $this->categoryRepositoryContract->getCategories();
    }
}
