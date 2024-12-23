<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Products::class, 'brandName');
    }
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'brand_category', 'brand_id', 'category_id');
    }
}
