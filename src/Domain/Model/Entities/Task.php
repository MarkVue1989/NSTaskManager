<?php

declare(strict_types=1);

namespace TaskManager\Domain\Model\Entities;

use TaskManager\Domain\ValueObjects\Categories;
use TaskManager\Domain\Model\Entities\Category;

final class Task
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly Categories $categories
    )
    {
    }
    /**
     * @return array<int|string|array<Category>>
     */
    public function toArray():array
    {
        return [
            'id'=> $this->id,
            'name' => $this->name,
            'categories' => $this->categories->toArray()
        ];
    }
}
