<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        if(!$products){
            return new PostResource('404', "Product Tidak Ditemukan", $products);
        }
        return new PostResource('200', "Berhasil mengambil data produk", $products);
    }
    public function show($id){
        $products = Product::find($id);
        if(!$products){
            return new PostResource('404', "Product Tidak Ditemukan", $products);
        }
        return new PostResource('200', "Berhasil mengambil data produk", ['products' => $products]);
    }
    public function getByCategories($category_id){
        $products = Product::where('category_id', $category_id)->get();
        if(!$products){
            return new PostResource('404', "Product Tidak Ditemukan", $products);
        }
        return new PostResource('200', "Berhasil mengambil data produk", ['products' => $products]);
    }

    public function getBySubCategories($subcategory_id){
        $products = Product::where('subcategory_id', $subcategory_id)->get();
        if(!$products){
            return new PostResource('404', "Product Tidak Ditemukan", $products);
        }
        return new PostResource('200', "Berhasil mengambil data produk", ['products' => $products]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'size' => 'required',
            'subcategory_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $product = Product::create([
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'size' => $request->size,
            'image' => $request->file('image')->store('images', 'public')
        ]);

        return new PostResource('200', "Berhasil Menambahkan Product", $product);
    }

    public function update(Request $request, $id){
        $product = Product::where('id', $id)->first();

        if(!$product){
            return new PostResource('404', "Product Tidak Ditemukan", $product);
        }
        
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'image' => $request->image,
            'category_id' => $request->category_id,
            'size' => $request->size,
        ]);
        return new PostResource('200', "Berhasil Mengupdate Product", $product);
    }

    public function destroy($id){
        $product = Product::find($id);
        if(!$product){
            return new PostResource('404', "Product Tidak Ditemukan", $product);
        }
        $product->delete();
        return new PostResource('200', "Behasil menghapus product", $product);
    }

}
