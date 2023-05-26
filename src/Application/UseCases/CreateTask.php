<?php

declare(strict_types=1);

namespace TaskManager\Application\UseCases;

use TaskManager\Domain\Contracts\TaskRepositoryContract;
use TaskManager\Domain\Contracts\TasksCategoriesRepositoryContract;
use TaskManager\Domain\Model\Entities\Task;

final class CreateTask
{
    public function __construct(
        private TaskRepositoryContract $taskRepositoryContract,
    )
    {
    }
    /**
     * @param array<int> $categories
     */
    public function __invoke(string $name, array $categories): Task
    {
        return $this->taskRepositoryContract->createTask($name, $categories);
    }
}
