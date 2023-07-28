<?php

namespace News\Remove;

use App\Models\Admin\Menu;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class RemovePackage
{
    private $pathMigration;
    private $pathScript;
    private $pathVues;
    public function __construct()
    {
        $this->pathMigration = database_path('migrations');
        $this->pathScript = public_path('assets/js/admin/news');
        $this->pathVues = resource_path('views/vendor/news');
    }

    public function run($settings,$migration = false, $script = false, $vies = false)
    {
        chdir(base_path());
        if($migration)
        {
            $categories = $this->pathMigration."/2023_03_05_203745_create_categories_news_table.php";
            $news = $this->pathMigration."/2023_03_07_181530_create_news_table.php";
            $newsHasCategories = $this->pathMigration."/2023_03_08_071047_create_categories_has_news_table.php";
            $settingsPath = $this->pathMigration."/2023_03_09_145210_create_news_settings_table.php";
            if (File::exists($settingsPath)) {
                exec($settings->php.'\php.exe artisan migrate:rollback --path=database/migrations/2023_03_09_145210_create_news_settings_table.php');
                unlink($settingsPath);
            }
            if (File::exists($newsHasCategories)) {

                exec($settings->php.'\php.exe artisan migrate:rollback --path=database/migrations/2023_03_08_071047_create_categories_has_news_table.php');
                unlink($newsHasCategories);

            }
            if (File::exists($categories)) {
                exec($settings->php.'\php.exe artisan migrate:rollback --path=database/migrations/2023_03_05_203745_create_categories_news_table.php');
                unlink($categories);
            }
            if (File::exists($news)) {
                exec($settings->php.'\php.exe artisan migrate:rollback --path=database/migrations/2023_03_07_181530_create_news_table.php');
                unlink($news);
            }


            $menu = Menu::query()->find(1000);
            $menu->delete();
        }

        if($script)
        {
            if (File::isDirectory($this->pathScript))
                File::deleteDirectory($this->pathScript);
        }

        if ($vies)
        {
            if (File::isDirectory($this->pathVues))
                File::deleteDirectory($this->pathVues);
        }
    }
}
