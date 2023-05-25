<?php

declare(strict_types=1);

namespace TaskManager\Domain\Model\Entities;

use TaskManager\Domain\ValueObjects\Categories;

final class Task
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly Categories $categories
    )
    {
    }
}
