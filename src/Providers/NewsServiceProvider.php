<?php

namespace News\Providers;

use Illuminate\Support\ServiceProvider;
use News\QueryBuilder\CategoryBuilder;
use News\QueryBuilder\NewsBuilder;
use News\QueryBuilder\QueryBuilder;
use News\Seeders\NewsDatabaseSeeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\AliasLoader;
use News\View\News;

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
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/news'),
        ], 'views');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'news');
        $this->loadViewsFrom(__DIR__.'/../../resources/components', 'news');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        Blade::component('news', News::class);
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Auth', Auth::class);
        });

//        Artisan::call('db:seed', [
//            '--class' => NewsDatabaseSeeder::class,
//        ]);

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
        $this->mergeConfigFrom(__DIR__.'/../../config/news.php', 'news');
    }
}
