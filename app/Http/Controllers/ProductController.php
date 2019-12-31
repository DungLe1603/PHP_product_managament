<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
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

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->back();
    }

    public function create()
    {
        $category = Category::all();
        return view('addproduct', compact('category'));
    }

    public function store(AddProductRequest $request)
    {
        $product = Product::create($request->all());
        foreach ($request->images as $image) {
            $image->storeAs('public/images', $image->getClientOriginalName());
            Image::create([
                'product_id' => $product->id,
                'name' => $image->getClientOriginalName()
            ]);
        }
        return redirect()->route('showProduct');
    }

    public function detail($id)
    {
        $product = Product::find($id);
        $categories = Category::All();
        $images = Image::All();
        return view('detail', compact('product', 'categories', 'images'));
    }

    public function update(AddProductRequest $request, $id)
    {
        $data = $request->all();
        $product = Product::findOrFail($id);
        $product->update($data);
        $time =  date('Y-m-d H:i:s');
        if (!empty($data['Dimages'])) {
            foreach ($data['Dimages'] as $del) {
                $image = Image::findOrFail($del);
                $image->delete();
                unlink('upload/product/'.$id.'/'.$image->name);
            }
        }
        if ($request->hasfile('images')) {
            foreach ($request->images as $image) {
                $name = strtotime($time)."_".$image->getClientOriginalName();
                if (!file_exists('upload/product/'.$id)) {
                    mkdir('upload/product/'.$id, 0777, true);
                }
                $path = 'upload/product/'.$id;
                $image->move($path, $name);
                Image::create([
                    'product_id' => $product->id,
                    'name' => $name
                ]);
            }
        }
        return redirect()->back();
    }
}
