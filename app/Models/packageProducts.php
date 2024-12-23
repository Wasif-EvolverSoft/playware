<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packageProducts extends Model
{
    use HasFactory;

    public function packageDetail()
    {
        return $this->belongsTo(PackageDetails::class, 'packageID');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'CategoryID');
    }
}
