<?php

namespace TaskManager\Domain\Contracts;

use TaskManager\Domain\ValueObjects\Categories;

interface CategoryRepositoryContract{
    public function getCategories():Categories;
}
