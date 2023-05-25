<?php

declare(strict_types=1);

namespace TaskManager\Domain\Model\Entities;

final class Category
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly bool $visible
    )
    {
    }
}
