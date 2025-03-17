<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

class WebController extends Controller
{
    public function index()
    {
        return view("admin.payment");
    }

    public function getSnapToken(Request $request)
    {
        // Config::$serverKey = env('SERVER_KEY');
        // Config::$isProduction = false;
        // Config::$isSanitized = true;
        // Config::$is3ds = true;
        dd($request->all());

        // $user = Auth::user();
        // $items = json_decode($request->input('items'), true); // Ambil data items dari request

        // if (!is_array($items) || empty($items)) {
        //     return response()->json(['error' => 'Item tidak boleh kosong'], 400);
        // }

        // // Log untuk debugging
        // Log::info('Item Details:', $items);

        // $grossAmount = array_sum(array_map(fn($item) => $item['subtotal'] ?? 0, $items));

        // if ($grossAmount < 0.01) {
        //     return response()->json(['error' => 'Total pembayaran harus lebih dari 0'], 400);
        // }

        // $params = [
        //     'transaction_details' => [
        //         'order_id' => "ORDER-" . rand(100000, 999999),
        //         'gross_amount' => $grossAmount,
        //     ],
        //     'item_details' => $items,
        //     'customer_details' => [
        //         'first_name' => $user->name,
        //         'email' => $user->email,
        //         'phone' => $request->input('phone', '08123456789'),
        //     ],
        // ];

        // try {
        //     $snapToken = Snap::getSnapToken($params);
        //     return response()->json(['snap_token' => $snapToken]);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Gagal mendapatkan token: ' . $e->getMessage()], 500);
        // }
        // $jsonData = $request->input('json');

        // // Debugging untuk melihat tipe data yang dikirim
        // if (is_array($jsonData)) {
        //     return response()->json([
        //         'message' => 'Data sudah dalam bentuk array',
        //         'data' => $jsonData
        //     ]);
        // } else {
        //     $decoded = json_decode($jsonData, true);
        //     return response()->json([
        //         'message' => 'Data setelah json_decode',
        //         'data' => $decoded
        //     ]);
        // }
    }

    public function payment_post(Request $request)
    {
        $json = $request->input('json'); // Gunakan input langsung, tidak perlu get()

        if (!is_array($json)) {
            return response()->json(['error' => 'Data transaksi tidak valid'], 400);
        }

        $order = new Order();
        $order->order_id = $json['order_id'] ?? null;
        $order->transaction_id = $json['transaction_id'] ?? null;
        $order->gross_amount = $json['gross_amount'] ?? 0;
        $order->payment_type = $json['payment_type'] ?? 'unknown';
        $order->transaction_status = $json['transaction_status'] ?? 'pending';
        $order->fraud_status = $json['fraud_status'] ?? null;
        $order->payment_code = $json['payment_code'] ?? null;
        $order->va_number = $json['va_numbers'][0]['va_number'] ?? null;
        $order->bank = $json['va_numbers'][0]['bank'] ?? null;
        $order->pdf_url = $json['pdf_url'] ?? null;
        $order->transaction_time = $json['transaction_time'] ?? now();
        $order->name = Auth::user()->name;
        $order->email = Auth::user()->email;

        return $order->save()
            ? redirect(url('/'))->with('alert-success', 'Order berhasil dibuat')
            : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
    }
}
