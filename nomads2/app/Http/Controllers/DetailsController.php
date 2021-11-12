<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index(request $request){
        return view('pages.details');
    }
}
