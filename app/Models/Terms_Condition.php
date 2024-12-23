<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terms_Condition extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'question',
        'answer',
        'order',
    ];
}
