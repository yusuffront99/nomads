<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(request $request){
        return view('pages.checkout');
    }

    public function success(request $request){
        return view('pages.success');
    }
}
