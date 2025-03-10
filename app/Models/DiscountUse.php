<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountUse extends Model
{
    protected $fillable = ['user_id', 'discount_id', 'uses'];

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
