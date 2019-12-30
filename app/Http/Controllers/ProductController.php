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
        $products = Product::All();
        $categories = Category::All();
        $images = Image::All();
        return view('show', compact('products', 'categories', 'images'));
    }

    public function detail()
    {
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->back();
    }
}
