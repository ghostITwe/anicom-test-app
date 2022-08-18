<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function getProduct($id)
    {
        $product = Product::with('category')->find($id);

        return view('product.product', [
            'product' => $product
        ]);
    }

    public function getProducts()
    {
        $products = Product::with('category')->get();

        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    public function createProduct()
    {
        $categories = Category::get()->toFlatTree();

        return view('admin.product.create', [
            'categories' => $categories,
            'product' => []
        ]);
    }

    public function storeProduct($createRequest)
    {
        $data = $createRequest->validated();

        if ($createRequest->has('image')) {
            $fileName = time() . '_' . $createRequest->file('image')->getClientOriginalName();
            $data['image'] = $createRequest->file('image')->storeAs('public/product', $fileName);
        }

        $product = Product::create($data);

        return redirect()->route('products.index')->with('success', "Товар {$product->id} был добавлен");
    }

    public function editProduct($id)
    {
        $product = Product::with('category')->find($id);
        $categories = Category::get()->toFlatTree();

        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function updateProduct($updateRequest, $id)
    {
        $product = Product::with('category')->find($id);
        $data = $updateRequest->validated();

        if ($updateRequest->has('image')) {
            $fileName = time() . '_' . $updateRequest->file('image')->getClientOriginalName();
            $data['image'] = $updateRequest->file('image')->storeAs('public/product', $fileName);
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', "Товар {$product->id} был изменён");
    }

    public function deleteProduct($id)
    {
        $product = Product::with('category')->find($id);

        $product->delete();

        return redirect()->route('products.index')->with('success', "Товар был удалён");
    }
}
