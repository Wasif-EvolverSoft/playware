<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageDetails extends Model
{
    use HasFactory;

    public function packageProducts()
    {
        return $this->hasMany(packageProducts::class, 'packageID', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
