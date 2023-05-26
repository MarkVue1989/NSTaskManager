<?php

declare(strict_types=1);

namespace TaskManager\Application\UseCases;

use TaskManager\Domain\Contracts\TaskRepositoryContract;

final class DeleteTask
{
    public function __construct(
        private TaskRepositoryContract $taskRepositoryContract,
    )
    {
    }

    public function __invoke(int $idTask): void
    {
        $this->taskRepositoryContract->deleteTask($idTask);
    }
}
