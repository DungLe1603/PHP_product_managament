<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Image;

class ProductController extends Controller
{
    public function show()
    {
        $products = Product::All()->toArray();
        $categories = Category::All()->toArray();
        $images = Image::All()->toArray();
        return view('show', compact('products', 'categories', 'images'));
    }

    public function detail()
    {
    }
}
