<?php

declare(strict_types=1);

namespace TaskManager\Domain\ValueObjects;

use TaskManager\Domain\Model\Entities\Task;
use TypeError;

final class Tasks
{
    /**
     * @param array<Task> $tasks
     */
    public function __construct(
        public readonly array $tasks
    )
    {
        $this->isValid();
    }

    private function isValid():void
    {
        foreach($this->tasks as $task){
            if(!$task instanceof Task){
                throw new TypeError(
                    sprintf("%s no es del tipo %s",$task, Task::class),409
                );
            }
        }
    }
    /**
     * @return array<Task>
     */
    public function toArray():array
    {
        //return $this->tasks;
        return array_map(function (Task $task){
            return [
                'id'=> $task->id,
                'name' => $task->name,
                'categories' => $task->categories->toArray(),
            ];
        }, $this->tasks);
    }
}
