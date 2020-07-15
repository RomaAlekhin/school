<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::paginate(5));
    }

    public function show(Product $product)
    {
        ProductResource::withoutWrapping();
        return new ProductResource($product);
    }
}
