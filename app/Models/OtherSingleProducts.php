<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherSingleProducts extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Products::class, 'productId', 'id');
    }
}
