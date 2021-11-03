<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $hidden = [

    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transcation_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
