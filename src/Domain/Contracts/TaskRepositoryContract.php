<?php

namespace TaskManager\Domain\Contracts;

use TaskManager\Domain\Model\Entities\Task;
use TaskManager\Domain\ValueObjects\Tasks;

interface TaskRepositoryContract{
    public function getTasks():Tasks;
    public function createTask(string $name, array $categories):Task;
}
