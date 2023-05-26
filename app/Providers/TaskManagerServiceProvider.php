<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TaskManagerServiceProvider extends ServiceProvider
{
    /**
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \TaskManager\Domain\Contracts\TaskRepositoryContract::class,
            \TaskManager\Infrastructure\Persistence\Repositories\TaskRepository::class
        );
        $this->app->bind(
            \TaskManager\Domain\Contracts\CategoryRepositoryContract::class,
            \TaskManager\Infrastructure\Persistence\Repositories\CategoryRepository::class
        );
        $this->app->bind(
            \TaskManager\Domain\Contracts\TasksCategoriesRepositoryContract::class,
            \TaskManager\Infrastructure\Persistence\Repositories\TasksCategoriesRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
