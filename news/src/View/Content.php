<?php

namespace News\View;


use App\QueryBuilder\RolesBuilder;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use News\QueryBuilder\CategoryBuilder;

class Content extends Component
{
    private Collection $categories;
    /**
     * Create a new component instance.
     */
    public function __construct(CategoryBuilder $categoryBuilder,RolesBuilder $rolesBuilder)
    {
        $this->categories = $categoryBuilder->getAll();
        $this->roles = $rolesBuilder->getAll();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('news::components.content',['categories'=>$this->categories,'roles' => $this->roles]);
    }
}
