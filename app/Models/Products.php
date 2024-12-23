<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brandName');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'productCategory');
    }

    public function otherSingleProducts()
    {
        return $this->hasMany(OtherSingleProducts::class, 'productId', 'id');
    }

    public function completePc()
    {
        return $this->hasMany(ProductVariations::class, 'productId', 'id');
    }

    public function AdditionalParts()
    {
        return $this->hasMany(AdditionalPcPartsData::class, 'productId', 'id');
    }

    public function AdditionalProducts()
    {
        return $this->hasMany(additionalProducts::class, 'productId', 'id');
    }

    public function PcLaptopStorage()
    {
        return $this->hasMany(StorageData::class, 'productId', 'id');
    }
    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'product_id');
    }

}
