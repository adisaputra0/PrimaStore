<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    //
    public function index(){
        $transaction = Transaction::all();
        if(auth()->user()->role == "penjual"){
            $transaction = Transaction::where("seller_id", auth()->user()->id)->get();
        }
        if(auth()->user()->role == "pembeli"){
            $transaction = Transaction::where("buyer_id", auth()->user()->id)->get();
        }
        return view("user.transactions")->with([
            "transactions" => $transaction,
        ]);
    }
    public function store($id)
    {
        $product = Product::find($id);
        // Handle password
        $validated['buyer_id'] = auth()->user()->id;
        $validated['seller_id'] = $product->user->id;
        $validated['product_id'] = $product->id;
        $validated['amount'] = $product->price;
        $validated['purchased_at'] = Carbon::now();

        // Ambil dompet user
        $wallet_buyer = Wallet::where("user_id", auth()->user()->id)->first();

        // Cek apakah saldo cukup
        if (!$wallet_buyer || $validated['amount'] > $wallet_buyer->balance) {
            return back()->withErrors(['amount' => 'Saldo tidak mencukupi.']);
        }

        $wallet_buyer->update([
            "balance" => $wallet_buyer->balance - $validated['amount']
        ]);

        $wallet_seller = Wallet::where("user_id", $product->user->id)->first();
        if($wallet_seller){
            $wallet_seller->update([
                "balance" => $wallet_seller->balance + $validated['amount']
            ]);
        }else{
            Wallet::create([
                "user_id" => $product->user->id,
                "balance" => $validated['amount']
            ]);
        }

        // Simpan ke database
        $transaction = Transaction::create($validated);

        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses membeli ' . $product->name
        ]);

        return redirect()->route('user.products');
    }
}
