<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review_replies extends Model
{
    use HasFactory;

    protected $fillable = ['review_id', 'user_id', 'reply', 'approved'];

    public function review()
    {
        return $this->belongsTo(Reviews::class, 'review_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
