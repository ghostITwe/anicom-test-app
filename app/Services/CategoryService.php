<?php

namespace App\Services;

use App\Http\Requests\category\CreateRequest;
use App\Models\Category;
use App\Models\Product;

class CategoryService
{
    public function getCategoriesFlatTree()
    {
        $categories = Category::get()->toFlatTree();

        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function getCategoriesTree() {
        return Category::get()->toTree();
    }

    public function getCategoryProducts($title)
    {
        $category = Category::with(['products'])->where('title', $title)->first();

        if ($category->isRoot()) {
            $categories = $category->descendants()->pluck('id');
            $categories[] = $category->getKey();
            $products = Product::whereIn('category_id', $categories)->get();
        } else {
            $products = Product::where('category_id', $category->id)->get();
        }

        $breadcrumbs = Category::defaultOrder()->ancestorsAndSelf($category->id);

        return view('product.products', [
            'products' => $products,
            'category' => $category,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function createCategory()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('admin.category.create', [
            'category' => [],
            'categories' => $categories,
            'delimiter' => ''
        ]);
    }

    public function storeCategory($createRequest)
    {
        $category = Category::create($createRequest->validated());

        return redirect()->route('categories.index')->with('success', "Категория {$category->id} была добавлена");
    }

    public function editCategory($id)
    {
        $category = Category::with('products')->find($id);
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('admin.category.edit', [
            'category' => $category,
            'categories' => $categories,
            'delimiter' => ''
        ]);
    }

    public function updateCategory($updateRequest, $id)
    {
        $category = Category::with('products')->find($id);
        $category->update($updateRequest->validated());

        return redirect()->route('categories.index')->with('success', "Категория {$category->id} была изменена");
    }

    public function deleteCategory($id)
    {
        $category = Category::with('products')->find($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Категория была удалена');
    }
}
