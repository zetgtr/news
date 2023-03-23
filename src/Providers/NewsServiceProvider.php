<?php

namespace News\Providers;

use Illuminate\Support\ServiceProvider;
use News\QueryBuilder\CategoryBuilder;
use News\QueryBuilder\NewsBuilder;
use News\QueryBuilder\QueryBuilder;
use News\Seeders\DatabaseSeeder;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryBuilder::class, NewsBuilder::class);
        $this->app->bind(QueryBuilder::class, CategoryBuilder::class);
        $this->app->register(DatabaseSeeder::class);
    }
}
