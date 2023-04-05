<?php

namespace News\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\QueryBuilder\RolesBuilder;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use News\QueryBuilder\CategoryBuilder;
use News\QueryBuilder\NewsBuilder;
use News\QueryBuilder\QueryBuilder;
use News\Seeders\NewsDatabaseSeeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\AliasLoader;
use \News\Http\Middleware\Auth as PacageAuth;
use News\View\Category;
use News\View\Content;
use News\View\EditContent;
use News\View\News;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use News\View\Settings;
use News\Models\News as NewsModel;

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
        $this->app['router']->aliasMiddleware('auth_pacage', PacageAuth::class);

        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path('migrations'),
        ], 'migrations');
        
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/news'),
        ], 'views');
        $this->publishes([
            __DIR__.'/../../resources/js' => public_path('assets/js/admin/news'),
        ], 'script');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'news');
        $this->loadViewsFrom(__DIR__.'/../../resources/components', 'news');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->components();
        $this->app->bind('news', function ($app) {
            return $app->make(NewsModel::class);
        });
    }

    private function components()
    {
        Blade::component(News::class, 'news::news');
        Blade::component(EditContent::class, 'news::edit-content');
        Blade::component(Content::class, 'news::content');
        Blade::component(Category::class, 'news::category');
        Blade::component(Settings::class, 'news::settings');
    }

    private function singletons()
    {
        $this->app->singleton(News::class, function ($app) {
            $newsBuilder = $app->make(NewsBuilder::class);
            return new News($newsBuilder);
        });
        $this->app->singleton(EditContent::class, function ($app, $parameters) {
            $categoryBuilder = $app->make(CategoryBuilder::class);
            $rolesBuilder = $app->make(RolesBuilder::class);
            $newsItem = $parameters['newsItem'];
            return new EditContent($categoryBuilder, $newsItem, $rolesBuilder);
        });
        $this->app->singleton(Content::class, function ($app) {
            $categoryBuilder = $app->make(CategoryBuilder::class);
            $rolesBuilder = $app->make(RolesBuilder::class);
            return new Content($categoryBuilder,$rolesBuilder);
        });
        $this->app->singleton(Category::class, function ($app) {
            $categoryBuilder = $app->make(CategoryBuilder::class);
            return new Category($categoryBuilder);
        });
        $this->app->singleton(Settings::class, function ($app) {
            return new Settings();
        });
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
        $this->singletons();
    }
}
