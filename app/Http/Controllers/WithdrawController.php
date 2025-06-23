<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WithdrawController extends Controller
{
    //
    public function index(){
        if(auth()->user()->role != 'admin'){
            return view("user.withdraws")->with([
                "withdraws" => Withdraw::where('user_id', auth()->user()->id)->get(),
            ]);
        }
        return view("user.withdraws")->with([
            "withdraws" => Withdraw::all(),
        ]);
    }
    
    public function store(Request $request)
    {
        // Validasi input terlebih dahulu
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'bank_name' => 'required|string',
            'bank_account' => 'required|string',
            'account_name' => 'required|string',
        ]);

        // Ambil dompet user
        $wallet = Wallet::where("user_id", $validated['user_id'])->first();

        // Cek apakah saldo cukup
        if (!$wallet || $validated['amount'] > $wallet->balance) {
            return back()->withErrors(['amount' => 'Saldo tidak mencukupi.']);
        }

        // Simpan data withdraw
        $withdraw = Withdraw::create($validated);

        // Update saldo
        $wallet->update([
            "balance" => $wallet->balance - $withdraw->amount
        ]);

        // Flash message sukses
        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses menambah withdraw ' . $withdraw->amount . ' PK. Mohon tunggu admin untuk approve dan mengirimkan uang ke rekening anda'
        ]);

        return redirect()->route('user.withdraws');
    }

    public function approve($id){
        $withdraw = Withdraw::find($id);
        return view('partials.withdraws.modal-approve')->with([
            "withdraw" => $withdraw
        ]);
    }
    public function reject($id){
        $withdraw = Withdraw::find($id);
        return view('partials.withdraws.modal-reject')->with([
            "withdraw" => $withdraw
        ]);
    }
    public function approved($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->update([
            "status" => "approved"
        ]);


        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses approved ' . $withdraw->user->name
        ]);

        return redirect()->route('user.withdraws');
    }
    
    public function rejected($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->update([
            "status" => "rejected"
        ]);


        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses rejected ' . $withdraw->user->name
        ]);
        $wallets = Wallet::where("user_id", $withdraw->user_id)->first();
        if($wallets){
            $amount = $wallets->balance + $withdraw->amount;
            $wallets->update([
                "balance" => $amount
            ]);
        }else{
            Wallet::create([
                "user_id" => $withdraw->user_id,
                "balance" => $withdraw->amount
            ]);
        }

        return redirect()->route('user.withdraws');
    }
}
