<?php

namespace TaskManager\Domain\Contracts;

use TaskManager\Domain\Model\Entities\Category;
use TaskManager\Domain\Model\Entities\Task;

interface TasksCategoriesRepositoryContract{
    public function createTaskCategories(int $idTask, int $idCategory):Category;
}
