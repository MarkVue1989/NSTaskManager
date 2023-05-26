<?php

declare(strict_types=1);

namespace TaskManager\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use TaskManager\Infrastructure\Persistence\Eloquent\EloquentCategoriesModel;

final class EloquentTasksCategoriesModel extends Model
{
    public $table = 'tasks_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'task_id',
        'category_id'
    ];
    protected $visible = [
        'id',
        'task_id',
        'category_id'
    ];

    public function categories():BelongsToMany
    {
        return $this->BelongsToMany(EloquentCategoriesModel::class, 'tasks_categories','task_id','category_id');
    }
}
