<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return new PostResource('200', "Berhasil mengambil data kategori", $categories);
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        Category::create(['name' => $request->name]);
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        if(!$category){
            return new PostResource('404', "Kategori Tidak Ditemukan", null);
        }
        $category->update(['name' => $request->name]);
        return new PostResource('200', "Berhasil Mengupdate Kategori", $category);
    }

    public function delete($id){
        $category = Category::find($id);
        if(!$category){
            return new PostResource('404', "Kategori Tidak Ditemukan", null);
        }
        $category->delete();
        return new PostResource('200', "Behasil Menghapus Kategori", $category);
    }
}
