<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use Validator;

class SubcategoryController extends Controller
{

    public function show($id){
        $category = Subcategory::find($id);
        if(!$category){
            return new PostResource('404', "Kategori Tidak Ditemukan", null);
        }
        return new PostResource('200', "Berhasil mengambil data kategori", $category);
    }

    public function store(Request $request){
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        Subcategory::create(['name' => $request->name, 'category_id' => $request->category_id]);

        return new PostResource('200', "Berhasil Menambahkan Kategori", null);
    }

    public function update(Request $request, $id){
        $category = Subcategory::find($id);
        if(!$category){
            return new PostResource('404', "Kategori Tidak Ditemukan", null);
        }
        $category->update(['name' => $request->name, 'category_id' => $request->category_id]);
        return new PostResource('200', "Berhasil Mengupdate Kategori", $category);
    }

    public function destroy($id){
        $category = Subcategory::find($id);
        if(!$category){
            return new PostResource('404', "Kategori Tidak Ditemukan", null);
        }
        $category->delete();
        return new PostResource('200', "Behasil Menghapus Kategori", $category);
    }
    
}
