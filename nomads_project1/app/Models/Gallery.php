<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [

    ];

    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id','id');
    }
}
