<?php

namespace App\View\Composers;

use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryComposer
{
    protected $categories;

    public function __construct(CategoryService $categories)
    {
        $this->categories = $categories;
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categories->getCategoriesTree());
    }
}
