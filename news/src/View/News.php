<?php

namespace News\View;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\View\Component;
use News\QueryBuilder\NewsBuilder;

class News extends Component
{
    private Collection $news;
    /**
     * Create a new component instance.
     */
    public function __construct(NewsBuilder $newsBuilder)
    {
        $this->news = $newsBuilder->getAll();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('news::components.news',['newsList'=>$this->news]);
    }
}
