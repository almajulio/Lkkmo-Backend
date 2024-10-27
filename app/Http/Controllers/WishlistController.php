<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Validator;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();
        if(!$wishlists){
            return new PostResource('404', "Wishlist Tidak Ditemukan");
        }
        return new PostResource('200', "Berhasil mengambil data wishlist", $wishlists);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $wishlist = Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id
        ]);
        return new PostResource('200', "Berhasil menambahkan product ke wishlist", $wishlist);
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        if(auth()->user()->id != $wishlist->user_id){
            return new PostResource('401', "Anda Tidak Memiliki Akses");
        }
        if(!$wishlist){
            return new PostResource('404', "Wishlist Tidak Ditemukan");
        }
        $wishlist->delete();
        return new PostResource('200', "Behasil menghapus wishlist");
    }
}
