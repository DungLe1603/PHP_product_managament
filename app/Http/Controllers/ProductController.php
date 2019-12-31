<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Product;
use App\Category;
use App\Image;
use File;

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
        $product = Product::destroy($id);
        Image::where('product_id', $id)->delete();
        if (file_exists('upload/product/'.$id)) {
            File::deleteDirectory(public_path('upload/product/'.$id));
        }
        if ($product) {
            return redirect()->route('showProduct')->with('success', 'Delete product success');
        } else {
            return redirect()->route('showProduct')->withErrors('Update product error.');
        }
    }

    public function create()
    {
        $category = Category::all();
        return view('addproduct', compact('category'));
    }

    public function store(AddProductRequest $request)
    {
        $product = Product::create($request->all());
        $time =  date('Y-m-d H:i:s');
        if ($request->hasfile('images')) {
            foreach ($request->images as $image) {
                $name = strtotime($time)."_".$image->getClientOriginalName();
                if (!file_exists('upload/product/'.$product->id)) {
                    mkdir('upload/product/'.$product->id, 0777, true);
                }
                $path = 'upload/product/'.$product->id;
                $image->move($path, $name);
                Image::create([
                    'product_id' => $product->id,
                    'name' => $name
                ]);
            }
        }
        if ($product) {
            return redirect()->route('showProduct')->with('success', 'Create product '.$product->name.' success');
        } else {
            return redirect()->route('showProduct')->withErrors('Update product error.');
        }
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
        if ($product->update($data)) {
            return redirect()->route('showProduct')->with('success', 'Update product '.$product->name.' success');
        } else {
            return redirect()->route('showProduct')->withErrors('Update product error.');
        }
    }
}
