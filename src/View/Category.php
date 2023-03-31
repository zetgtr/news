<?php

namespace News\View;


use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use News\QueryBuilder\CategoryBuilder;

class Category extends Component
{

    private Collection $categories;
    /**
     * Create a new component instance.
     */
    public function __construct(CategoryBuilder $categoryBuilder)
    {
        $this->categories = $categoryBuilder->getAll();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('news::components.category',['categories'=>$this->categories]);
    }
}
