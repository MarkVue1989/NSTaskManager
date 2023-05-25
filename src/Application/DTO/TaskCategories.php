<?php

namespace TaskManager\Application\DTO;

use TaskManager\Domain\Model\Entities\Task;
use TaskManager\Domain\ValueObjects\Categories;

final class TaskCategories
{
    public function __construct(
        public readonly Task $task,
        public readonly Categories $categories
    )
    {

    }

    public static function fromProducto(
        Task $task,
        Categories $categories
    ): self
    {
        return new self(
            task: $task,
            categories: $categories
        );
    }

    public function toArray(){
        return [
            $this->task,
            $this->categories
        ];
    }
}
