<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
    public function index()
    {
        return view("user.coins");
        // return view("user.payment");
    }

    public function getSnapToken(Request $request)
{
    Config::$serverKey = env('SERVER_KEY');
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $user = Auth::user();
    $phone = $request->input('phone');
    $items = $request->input('items');

    $orderId = "ORDER-" . rand(100000, 999999);
    $grossAmount = collect($items)->sum('subtotal');

    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => $grossAmount,
        ],
        'item_details' => $items,
        'customer_details' => [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $phone,
        ],
    ];

    try {
        $snapToken = Snap::getSnapToken($params);
        return response()->json(['snap_token' => $snapToken, 'order_id' => $orderId]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Gagal mendapatkan token: ' . $e->getMessage()], 500);
    }
}

    public function payment_post(Request $request)
    {
        $json = $request->all();

        // Log untuk debugging
        Log::info('Data masuk ke payment_post:', $json);

        if (!isset($json['order_id'])) {
            return redirect('/')->with('alert-failed', 'Order ID tidak ditemukan.');
        }

        // Cek apakah order_id sudah ada di database
        $order = Order::where('order_id', $json['order_id'])->first();

        if (!$order) {
            // Jika tidak ditemukan, buat baru
            $order = new Order();
            $order->order_id = $json['order_id'];
        }

         // Ambil data VA Number jika ada
        $vaNumber = null;
        $bankName = null;

    if (isset($json['va_numbers'][0])) {
        $vaNumber = $json['va_numbers'][0]['va_number'] ?? null;
        $bankName = $json['va_numbers'][0]['bank'] ?? null;
    }

        // Isi data dari Midtrans
        $order->transaction_id = $json['transaction_id'] ?? $order->transaction_id;
        $order->gross_amount = $json['gross_amount'] ?? $order->gross_amount;
        $order->payment_type = $json['payment_type'] ?? 'unknown';
        $order->transaction_status = $json['transaction_status'] ?? 'pending';
        $order->fraud_status = $json['fraud_status'] ?? null;
        $order->payment_code = $json['payment_code'] ?? null;
        $order->va_number = $vaNumber ?? $order->va_number;
        $order->bank = $bankName ?? $order->bank;
        $order->pdf_url = $json['pdf_url'] ?? null;
        $order->transaction_time = $json['transaction_time'] ?? now();
        $order->name = Auth::user()->name;
        $order->email = Auth::user()->email;

        // Simpan data
        if ($order->save()) {
            // return redirect('/')->with('alert-success', 'Order berhasil disimpan.');
            $wallet_buyer = Wallet::where("user_id", auth()->user()->id)->first();

            // Cek apakah saldo cukup
            if (!$wallet_buyer) {
                Wallet::create([
                    "user_id" => $product->user->id,
                    "balance" => $validated['amount']
                ]);
            }else{
                $wallet_buyer->update([
                    "balance" => $wallet_buyer->balance + $validated['amount']
                ]);
            }

            
            Session::flash('message', [
                'icon' => 'success',
                'text' => 'Berhasil topup'
            ]);
            return redirect()->route('user.coins');
        } else {
            // return redirect('/')->with('alert-failed', 'Terjadi kesalahan saat menyimpan order.');
            Session::flash('message', [
                'icon' => 'error',
                'text' => 'Terjadi kesalahan saat topup'
            ]);
            return redirect()->route('user.coins');
        }


    }



}
