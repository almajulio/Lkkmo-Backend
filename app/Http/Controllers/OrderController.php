<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return new PostResource('200', "Berhasil mengambil data order", $orders);
    }
    public function store(Request $request){
        $request->validate([
            'rental_start' => 'required',
            'rental_end' => 'required',
            'total_price' => 'required',
            'status' => 'required',
        ]);

        Order::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'rental_start' => $request->rental_start,
            'rental_end' => $request->rental_end,
            'total_price' => $request->total_price,
            'status' => $request->status
        ]);

        return new PostResource('200', "Berhasil Menambahkan Order", null);
    }

    public function update(Request $request, $id){
        $order = Order::find($id);
        if(!$order){
            return new PostResource('404', "Order Tidak Ditemukan", $order);
        }
        $order->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'rental_start' => $request->rental_start,
            'rental_end' => $request->rental_end,
            'total_price' => $request->total_price,
            'status' => $request->status
        ]);
        return new PostResource('200', "Berhasil Mengupdate Order", $order);
    }

    public function delete($id){
        $order = Order::find($id);
        if(!$order){
            return new PostResource('404', "Order Tidak Ditemukan", $order);
        }
        $order->delete();
        return new PostResource('200', "Behasil Menghapus Order", $order);
    }
}
