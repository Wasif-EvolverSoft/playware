<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bank_name',
        'account_number',
        'account_title',
        'iban',
        'swift_code',
        'branch_address',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
