<?php

namespace News\View;

use App\QueryBuilder\RolesBuilder;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use News\QueryBuilder\CategoryBuilder;
use \News\Models\News;

class EditContent extends Component
{
    private Collection $categories;
    private News $news;
    /**
     * Create a new component instance.
     */
    public function __construct(CategoryBuilder $categoryBuilder,News $newsItem, RolesBuilder $rolesBuilder)
    {
        $this->categories = $categoryBuilder->getAll();
        $this->news = $newsItem;
        $this->roles = $rolesBuilder->getAll();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if(count($this->news->categories()->pluck('id')))
            $categoryNews = $this->news->categories()->pluck('id')[0];
        else $categoryNews = 1;
        return view('news::components.edit-content',['categories' => $this->categories,'news' => $this->news, 'categoryNews'=>$categoryNews, 'roles' => $this->roles]);
    }
}
