<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(request $request, $id){
        $item = Transaction::with(['details', 'travel-package','user'])->findOrFail($id);

        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    public function process(Request $request, $id){
        $travel_package = TravelPackage::findOrFail($id);
        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth()::user()->id,
            'additional_total' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id){
        $item = TransactionDetail::findOrFile($detail_id);

        $transaction = Transaction::with(['details', 'travel_package'])->findOrFail($item->transaction_id);

        if($item->is_visa){
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transaction_id);

    }

    public function create(Request $request, $id){
        $request->validate([
            'username' => 'required|string|exists:users, username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);

        $data = $request->all();
        $data['transaction_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        if($request->is_visa){
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;
        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function success(request $request, $id){
        $transaction = Transaction::findOrFile($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        
        return view('pages.success');
    }


}
