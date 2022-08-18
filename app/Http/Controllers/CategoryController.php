<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryServ;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryServ = $categoryService;
    }

    public function show($title)
    {
        return $this->categoryServ->getCategoryProducts($title);
    }
}
