<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();
        if(!$wishlists){
            return new PostResource('404', "Wishlist Tidak Ditemukan", $wishlists);
        }
        return new PostResource('200', "Berhasil mengambil data wishlist", $wishlists);
    }

    public function store(Request $request)
    {
        $wishlist = Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id
        ]);
        return new PostResource('200', "Berhasil menambahkan product ke wishlist", $wishlist);
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        if(auth()->user()->id != $wishlist->user_id || auth()->user()->role != 'admin'){
            return new PostResource('401', "Anda Tidak Memiliki Akses", $wishlist);
        }
        if(!$wishlist){
            return new PostResource('404', "Wishlist Tidak Ditemukan", $wishlist);
        }
        $wishlist->delete();
        return new PostResource('200', "Behasil menghapus wishlist", $wishlist);
    }
}
