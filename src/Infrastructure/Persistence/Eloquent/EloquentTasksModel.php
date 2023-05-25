<?php

declare(strict_types=1);

namespace TaskManager\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use TaskManager\Infrastructure\Persistence\Eloquent\EloquentCategoriesModel;

final class EloquentTasksModel extends Model
{
    public $table = 'tasks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
    protected $visible = [
        'id',
        'name',
        'categories'
    ];

    public function categories():BelongsToMany
    {
        return $this->BelongsToMany(EloquentCategoriesModel::class, 'tasks_categories','task_id','category_id');
    }
}
