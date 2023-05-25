<?php

declare(strict_types=1);

namespace TaskManager\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

final class EloquentCategoriesModel extends Model
{
    public $table = 'categories';
    protected $primaryKey = 'id';
    protected $casts = [
        'visible' => 'boolean'
    ];
    protected $fillable = [
        'name',
        'visible'
    ];
    protected $visible = [
        'id',
        'name',
        'visible'
    ];
}
