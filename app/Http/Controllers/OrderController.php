<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use Validator;

class OrderController extends Controller
{
    public function sendMessage($target, $message)
    {
       
    }
    public function index(){
        $user_id = auth()->user()->id;
        $orders = Order::where('user_id', $user_id)->get();
        return new PostResource('200', "Berhasil mengambil data order", $orders);
    }

    public function getAll(){
        $orders = Order::with('user', 'product')->get();
        return new PostResource('200', "Berhasil mengambil semua data order", $orders);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'rental_start' => 'required',
            'rental_end' => 'required',
            'total_price' => 'required',
            'quantity' => 'required',
            'product_id' => 'required',
            'status' => 'required|in:Belum,Selesai',
            'size' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $produk = Product::find($request->product_id);
        $user = User::find(auth()->user()->id);

        $url = 'https://api.fonnte.com/send';
        $token = '2TQsabhhruZyHNz17PRt'; // Ganti dengan token Anda

        // Inisialisasi cURL
        $curl = curl_init();

        // Mengatur opsi cURL
        $postData = [
            'target' => '082379198888',
            'message' => 'Halo '. $user->name . ',! Terima kasih telah memilih *Renturstyle* untuk kebutuhan rental Anda!\n\n
                            Berikut adalah detail pesanan Anda:\n
                            - Nama Produk: ' . $produk->name . '\n
                            - Ukuran: ' . $request->size . '\n
                            - Jumlah Pesanan: ' . $request->quantity . '\n
                            - Total Harga: Rp ' . $request->total_price . '\n\n
                            Periode Rental:\n
                            - Mulai Rental: ' . $request->rental_start . '\n
                            - Akhir Rental: ' . $request->rental_end . '\n\n
                            Untuk melanjutkan, silakan melakukan pembayaran sejumlah Rp ' . $request->total_price . ' ke rekening Dana berikut:\n
                            082180918098 (a.n Renturstyle)\n\n
                            Setelah pembayaran diterima, kami akan segera memproses pesanan Anda.\n\n
                            Terima kasih!',
            'countryCode' => '62' // optional, bisa disesuaikan jika perlu
        ];

        // Mengatur opsi
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => [
                "Authorization: $token",
            ],
        ]);

        // Eksekusi cURL dan ambil respons
        $response = curl_exec($curl);

        // Tutup cURL
        curl_close($curl);


        Order::create([
            'user_id' => auth()->user()->id,
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'size' => $request->size,
            'rental_start' => $request->rental_start,
            'rental_end' => $request->rental_end,
            'total_price' => $request->total_price,
            'status' => $request->status
        ]);

        $product = Product::find($request->product_id);
        $product->update([
            'stock' => $product->stock - $request->quantity
        ]);

        return new PostResource('200', "Berhasil Menambahkan Order", null);
    }

    public function update(Request $request, $id){
        $order = Order::find($id);
        if(!$order){
            return new PostResource('404', "Order Tidak Ditemukan", $order);
        }

        if(auth()->user()->id == $order->user_id || auth()->user()->role == 'admin'){
            $order->update([
                'quantity' => $request->quantity,
                'product_id' => $request->product_id,
                'rental_start' => $request->rental_start,
                'rental_end' => $request->rental_end,
                'total_price' => $request->total_price,
                'status' => $request->status
            ]);
            return new PostResource('200', "Berhasil Mengupdate Order", $order);
        }
        return new PostResource('401', "Anda Tidak Memiliki Akses");
    }

    public function delete($id){
        $order = Order::find($id);
        if(!$order){
            return new PostResource('404', "Order Tidak Ditemukan", $order);
        }
        if(auth()->user()->id == $order->user_id || auth()->user()->role == 'admin'){
            $order->delete();
            return new PostResource('200', "Behasil Menghapus Order", $order);
        }
        return new PostResource('401', "Anda Tidak Memiliki Akses");
    }


}
