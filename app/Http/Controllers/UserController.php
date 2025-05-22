<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function index(){

        $total_products = Product::count();  // Menghitung jumlah produk
        $total_transactions = Transaction::count();  // Menghitung jumlah transaksi
        $total_coins = Wallet::sum('balance');  // Menghitung jumlah total koin
        $products = Product::all();

        if(auth()->user()->role == "penjual"){
            $total_products = Product::where("user_id", auth()->user()->id)->count(); // Menghitung jumlah produk
            $total_transactions = Transaction::where("seller_id", auth()->user()->id)->count();  // Menghitung jumlah transaksi
            $total_coins = optional(Wallet::where("user_id", auth()->id())->first())->balance ?? 0;
            $products = Product::where("user_id", auth()->user()->id)->get();
        }

        return view("user.dashboard")->with([
            "total" => [
                "total_users" => User::where('role', '!=', 'admin')->count(),  // Menghitung jumlah user
                "total_products" => $total_products,  // Menghitung jumlah produk
                "total_transactions" => $total_transactions,  // Menghitung jumlah transaksi
                "total_coins" => $total_coins,  // Menghitung jumlah total koin
                "total_pembeli" => User::where("role", "pembeli")->count(),
                "total_penjual" => User::where("role", "penjual")->count()
            ],
            "products" => $products,
        ]);
    }
    public function users(){
        return view("user.users")->with([
            "users" => User::where('id', '!=', auth()->id())->get(),
        ]);
    }
    public function transactions(){
        return view("user.transactions")->with([
            "transactions" => Transaction::all(),
        ]);
    }
    public function detail($id){
        $user = User::find($id);
        return view('partials.users.modal-detail')->with([
            "user" => $user
        ]);
    }
    public function edit($id){
        $user = User::find($id);
        return view('partials.users.modal-edit')->with([
            "user" => $user
        ]);
    }
    public function delete($id){
        $user = User::find($id);
        return view('partials.users.modal-delete')->with([
            "user" => $user
        ]);
    }
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => "required",
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'ktm' => 'image|mimes:jpeg,png,jpg',
            'phone' => 'nullable|string|max:15',
            'bio' => 'nullable|string|max:1000',
            'is_verified' => 'required',
            'role' => 'required',
        ]);

        // Handle password
        $validated['password'] = bcrypt($validated['password']);

        // Handle image
        if ($request->hasFile('image')) {
            $imageName = uniqid() . '.' . $request->image->extension();
            $request->image->move('images/photos', $imageName);
            $validated['image'] = $imageName;
        }

        // Handle ktm
        if ($request->hasFile('ktm')) {
            $ktmName = uniqid() . '.' . $request->ktm->extension();
            $request->ktm->move('images/ktm', $ktmName);
            $validated['ktm'] = $ktmName;
        }

        // Simpan ke database
        $user = User::create($validated);

        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses Menambah ' . $user->email
        ]);

        return redirect()->route('users');
    }

    public function update($id, Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'ktm' => 'image|mimes:jpeg,png,jpg',
            'phone' => 'nullable|string|max:15',
            'bio' => 'nullable|string|max:1000',
            'is_verified' => 'required',
            'role' => 'required',
        ]);


        
        $user = User::findOrFail($id);

        // Handle image
        if ($request->hasFile('image')) {
            $file_path = public_path("images/photos/" . $user->image);
            if(File::exists($file_path)){
                File::delete($file_path);
            }

            $imageName = uniqid() . '.' . $request->image->extension();
            $request->image->move('images/photos/', $imageName);
            $validated['image'] = $imageName;
        }

        // Handle ktm
        if ($request->hasFile('ktm')) {
            $file_path = public_path("images/ktm/" . $user->ktm);
            if(File::exists($file_path)){
                File::delete($file_path);
            }

            $ktmName = uniqid() . '.' . $request->ktm->extension();
            $request->ktm->move('images/ktm/', $ktmName);
            $validated['ktm'] = $ktmName;
        }

        $user->update($validated);


        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses Edit ' . $user->email
        ]);

        return redirect()->route('users');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Handle image
        if ($user->image) {
            $file_path = public_path("images/photos/" . $user->image);
            if(File::exists($file_path)){
                File::delete($file_path);
            }
        }

        // Handle ktm
        if ($user->ktm) {
            $file_path = public_path("images/ktm/" . $user->ktm);
            if(File::exists($file_path)){
                File::delete($file_path);
            }
        }

        $email = $user->email;
        $user->delete();


        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses Delete ' . $email
        ]);

        return redirect()->route('users');
    }
}
