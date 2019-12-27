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

    public function create()
    {
        $category = Category::all();
        return view('addproduct',compact('category'));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        foreach ($request->images as $image) {
            $filename = $image->storeAs('public/images');
            Image::create([
                'id_product' => $product->id,
                'name' => $filename
            ]);
        }
        return redirect()->back();
    }
}
