<?php

declare(strict_types=1);

namespace TaskManager\Domain\ValueObjects;

use TaskManager\Domain\Model\Entities\Category;
use TypeError;

final class Categories
{
    /**
     * @param array<Category> $categories
     */
    public function __construct(
        public readonly array $categories
    )
    {
        $this->isValid();
    }

    private function isValid():void
    {
        foreach($this->categories as $category){
            if(!$category instanceof Category){
                throw new TypeError(
                    sprintf("%s no es del tipo %s",$category, Category::class),409
                );
            }
        }
    }
    /**
     * @return array<Category>
     */
    public function toArray():array
    {
        return array_map(function (Category $category){
            return [
                'id'=> $category->id,
                'name' => $category->name,
                'visible' => $category->visible,
            ];
        }, $this->categories);
    }
}
