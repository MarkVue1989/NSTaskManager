<?php

namespace TaskManager\Domain\Contracts;

use TaskManager\Domain\ValueObjects\Tasks;

interface TaskRepositoryContract{
    public function getTasks():Tasks;
}
