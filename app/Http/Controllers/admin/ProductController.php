<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CreateRequest;
use App\Http\Requests\product\UpdateRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService  $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->productService->getProducts();
    }

    public function create()
    {
        return $this->productService->createProduct();
    }

    public function store(CreateRequest $request)
    {
        return $this->productService->storeProduct($request);
    }

    public function show($id)
    {
        return $this->productService->getProduct($id);
    }

    public function edit($id)
    {
        return $this->productService->editProduct($id);
    }

    public function update(UpdateRequest $request, $id)
    {
        return $this->productService->updateProduct($request, $id);
    }

    public function destroy($id)
    {
        return $this->productService->deleteProduct($id);
    }
}
