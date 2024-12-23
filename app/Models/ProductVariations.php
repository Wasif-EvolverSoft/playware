<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariations extends Model
{
    use HasFactory;

    public function ProcessorBrand()
    {
        return $this->belongsTo(Brands::class, 'ProcessorBrand');
    }
    public function GraphicCardBrand()
    {
        return $this->belongsTo(Brands::class, 'GraphicCardBrand');
    }
    public function MotherBoardBrand()
    {
        return $this->belongsTo(Brands::class, 'MotherBoardBrand');
    }
    public function RamBrand()
    {
        return $this->belongsTo(Brands::class, 'RamBrand');
    }
    public function PSUBrand()
    {
        return $this->belongsTo(Brands::class, 'PSUBrand');
    }
    public function CaseBrand()
    {
        return $this->belongsTo(Brands::class, 'CaseBrand');
    }
    public function CoolerBrand()
    {
        return $this->belongsTo(Brands::class, 'CoolerBrand');
    }
}
