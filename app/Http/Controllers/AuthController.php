<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register_seller(){
        return view("auth.register_seller");
    }
}
