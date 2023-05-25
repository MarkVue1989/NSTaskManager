<?php

declare(strict_types=1);

namespace TaskManager\Application\UseCases;

use TaskManager\Domain\Contracts\TaskRepositoryContract;
use TaskManager\Domain\ValueObjects\Tasks;

final class GetTasks
{
    public function __construct(
        private TaskRepositoryContract $taskRepositoryContract
    )
    {
    }

    public function __invoke(): Tasks
    {
        return $this->taskRepositoryContract->getTasks();
    }
}
