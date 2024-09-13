<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);

        Review::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return new PostResource('200', "Berhasil Menambahkan Review", null);
    }

    public function update(Request $request, $id){
        $review = Review::find($id);
        if(!$review){
            return new PostResource('404', "Review Tidak Ditemukan", $review);
        }
        $review->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);
        return new PostResource('200', "Berhasil Mengupdate Review", $review);
    }

}
