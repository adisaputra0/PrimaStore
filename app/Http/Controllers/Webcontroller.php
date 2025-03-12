<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Webcontroller extends Controller
{

    public function index ()
    {
        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-Fky8nx8PRFahmS-DiqFW0Cho';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $user = FacadesAuth::user();
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'item_details' => array(
                [
                    "id" => "a01",
                    "price" => 7000,
                    "quantity" => 1,
                    "name" => "Apple"
                ],
                [
                    "id" => "a02",
                    "price" => 7000,
                    "quantity" => 5,
                    "name" => "Jeruk"
                ],
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'last_name' => 'pratama',
                'email' => $user->email,
                'phone' => '08111222333',
            ),
        );

        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        
        return view("admin.payment", ['snap_token'=>$snapToken]);
    }

    public function payment_post(Request $request){
        return $request;
    }
}
