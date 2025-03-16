<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        return view("home");
    }
    public function about(){
        return view("about");
    }
    public function products(){
        return view("products");
    }
    public function coming_soon(){
        return view("coming_soon");
    }
}
