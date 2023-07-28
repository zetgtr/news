<?php

namespace News\QueryBuilder;

use Illuminate\Database\Eloquent\Collection;
use News\Enums\NewsEnums;
use News\Models\Category;
use News\Models\News;

class NewsBuilder extends QueryBuilder
{
    public function __construct()
    {
        $this->model = News::query();
    }

    public function getLinksContent($key)
    {
        $links = [NewsEnums::CONTENT->value => ['url'=> NewsEnums::CONTENT->value, 'name' => 'Контент'],
            NewsEnums::SEO->value => ['url'=> NewsEnums::SEO->value,  'name' => 'SEO']
        ];

        $links[$key]['active'] = true;

        return $links;
    }
    public function getLinks($key)
    {
        $links = [
            NewsEnums::NEWS->value => ['url'=> route('admin.news.index'), 'name' => 'Новости'],
            NewsEnums::POST->value => ['url'=> route('admin.news.create'),  'name' => 'Пост'],
            NewsEnums::CATEGORY->value => ['url'=> route('admin.news.category.create'),  'name' => 'Категории'],
            NewsEnums::SETTINGS->value => ['url'=> route('admin.news.settings.create'),  'name' => 'Настройки']
        ];

        if($key) $links[$key]['active'] = true;

        return $links;
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
