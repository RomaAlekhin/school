<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::where('id', 5)->first();
        dd($product);

        return view('home.index');
    }
}
