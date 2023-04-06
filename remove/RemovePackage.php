<?php

namespace News\Remove;

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

    public function run($migration = false, $script = false, $vies = false)
    {
        if($migration)
        {
            unlink($this->pathMigration."/2023_03_05_203745_create_categories_news_table.php");
            unlink($this->pathMigration."/2023_03_07_181530_create_news_table.php");
            unlink($this->pathMigration."/2023_03_08_071047_create_categories_has_news_table.php");
            unlink($this->pathMigration."/2023_03_09_145210_create_news_settings_table.php");
        }

        if($script)
        {
            rmdir($this->pathScript);
        }

        if ($vies)
        {
            rmdir($this->pathVues);
        }
    }
}