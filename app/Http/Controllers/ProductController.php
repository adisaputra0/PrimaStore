<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //
    public function index(){
        if(auth()->user()->role == "pembeli"){
            $products = Product::all();
            foreach ($products as $product) {
                $product->reviews = Review::where('product_id', $product->id)->get();
                $product->average_rating = Review::where('product_id', $product->id)->avg('rating') ?? 0;
            }
            return view("user.products")->with([
                "products" => $products,
            ]);

        }
        if(auth()->user()->role != 'admin'){
            return view("user.products")->with([
                "products" => Product::where('user_id', auth()->user()->id)->get(),
            ]);
        }

        return view("user.products")->with([
            "products" => Product::all(),
        ]);
    }
    // public function purchased(){
    //     $transaction = Transaction::where("buyer_id", auth()->user()->id)->get();
    //     $products = $transaction->product;
    //     foreach ($products as $product) {
    //         $product->reviews = Review::where('product_id', $product->id)->get();
    //         $product->average_rating = Review::where('product_id', $product->id)->avg('rating') ?? 0;
    //     }
    //     return view("user.purchased")->with([
    //         "products" => $products,
    //     ]);
    // }
    public function purchased() {
        $transactions = Transaction::where('buyer_id', auth()->id())->get();

        $products = $transactions->map(function ($transaction) {
            $product = $transaction->product; // pastikan ada relasi `product()` di model Transaction
            if ($product) {
                $product->reviews = Review::where('product_id', $product->id)->get();
                $product->average_rating = Review::where('product_id', $product->id)->avg('rating') ?? 0;
            }
            return $product;
        })->filter(); // menghapus null jika tidak ada produk

        return view('user.purchased', [
            'products' => $products
        ]);
    }

    
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'file' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif',
            'link' => 'nullable',
        ]);

        if ($request->hasFile('file')) {
            $fileName = uniqid() . '.' . $request->file->extension();
            $request->file->move('folders', $fileName);
            $validated['file'] = $fileName;
        }

        if ($request->hasFile('picture')) {
            $pictureName = uniqid() . '.' . $request->picture->extension();
            $request->picture->move('images/products', $pictureName);
            $validated['picture'] = $pictureName;
        }

        // Simpan ke database
        $product = Product::create($validated);

        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses Menambah ' . $product->name
        ]);

        return redirect()->route('user.products');
    }
    public function detail($id)
    {
        $product = Product::find($id);
        $reviews = Review::where('product_id', $id)->get();

        // Hitung rata-rata rating, default ke 0 jika tidak ada review
        $average_rating = Review::where('product_id', $id)->avg('rating') ?? 0;
        $product->purchased = true;

        if(auth()->user()->role == "pembeli"){
            $product->purchased = Transaction::where("buyer_id", auth()->user()->id)->where("product_id", $id)->first()? true : false;
        }

        return view('partials.products.modal-detail')->with([
            'product' => $product,
            'reviews' => $reviews,
            'average_rating' => round($average_rating, 1), // dibulatkan 1 angka di belakang koma
        ]);
    }
    public function edit($id){
        $product = Product::find($id);
        return view('partials.products.modal-edit')->with([
            "product" => $product
        ]);
    }
    public function delete($id){
        $product = Product::find($id);
        return view('partials.products.modal-delete')->with([
            "product" => $product
        ]);
    }
    public function update($id, Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'file' => 'nullable',
            'picture' => 'image|mimes:jpeg,png,jpg,gif',
            'link' => 'nullable',
        ]);


        $product = Product::findOrFail($id);

        if ($request->hasFile('picture')) {
            $file_path = public_path("images/products/" . $product->picture);
            if(File::exists($file_path)){
                File::delete($file_path);
            }

            $pictureName = uniqid() . '.' . $request->picture->extension();
            $request->picture->move('images/products/', $pictureName);
            $validated['picture'] = $pictureName;
        }

        if ($request->hasFile('file')) {
            $file_path = public_path("folders/" . $product->file);
            if(File::exists($file_path)){
                File::delete($file_path);
            }

            $fileName = uniqid() . '.' . $request->file->extension();
            $request->file->move('folders/', $fileName);
            $validated['file'] = $fileName;
        }

        $product->update($validated);


        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses Edit ' . $product->name
        ]);

        return redirect()->route('user.products');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->picture) {
            $file_path = public_path("images/products/" . $product->picture);
            if(File::exists($file_path)){
                File::delete($file_path);
            }
        }

        if ($product->file) {
            $file_path = public_path("folders/" . $product->file);
            if(File::exists($file_path)){
                File::delete($file_path);
            }
        }

        $name = $product->name;
        $product->delete();


        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses Delete ' . $name
        ]);

        return redirect()->route('user.products');
    }
}
