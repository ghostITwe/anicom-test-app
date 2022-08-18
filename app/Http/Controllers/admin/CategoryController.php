<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\CreateRequest;
use App\Http\Requests\category\UpdateRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $categoryService;

    public function __construct(CategoryService  $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return $this->categoryService->getCategoriesFlatTree();
    }

    public function create()
    {
        return $this->categoryService->createCategory();
    }

    public function store(CreateRequest $request)
    {
        return $this->categoryService->storeCategory($request);
    }

    public function edit($id)
    {
        return $this->categoryService->editCategory($id);
    }

    public function update(UpdateRequest $request, $id)
    {

    }


    public function destroy($id)
    {
        return $this->categoryService->deleteCategory($id);
    }
}
