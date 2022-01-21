<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'transaction_id','username','nationality','is_visa','doe_passport'
    ];

    //Relationship
    public function transaction(){
        return $this->belongsTo(TravelPackage::class, 'transaction_id', 'id');
    }

}
