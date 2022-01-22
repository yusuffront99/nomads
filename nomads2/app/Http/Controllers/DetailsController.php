<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;

class DetailsController extends Controller
{
    public function index(request $request, $slug){
        
        $item = TravelPackage::with(['galleries'])
        ->where('slug', $slug)
        ->firstOrFail();

        return view('pages.details', [
            'item' => $item
        ]);
    }
}
