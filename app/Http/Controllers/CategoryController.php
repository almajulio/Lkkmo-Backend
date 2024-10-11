<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::with('subcategories')->get();
        return new PostResource('200', "Berhasil mengambil data kategori", $categories);
    }

    public function store(Request $request){
         $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        Category::create(['name' => $request->name]);

        return new PostResource('200', "Berhasil Menambahkan Kategori", null);
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        if(!$category){
            return new PostResource('404', "Kategori Tidak Ditemukan", null);
        }
        $category->update(['name' => $request->name]);
        return new PostResource('200', "Berhasil Mengupdate Kategori", $category);
    }

    public function destroy($id){
        $category = Category::find($id);
        if(!$category){
            return new PostResource('404', "Kategori Tidak Ditemukan", null);
        }
        $category->delete();
        return new PostResource('200', "Behasil Menghapus Kategori", $category);
    }
}
