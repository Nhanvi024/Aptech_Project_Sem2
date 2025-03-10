<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'code',
        'name',
        'type',
        'discount_value',
        'max_discount_value',
        'quantity',
        'condition',
        'max_uses',
        'starts_at',
        'expires_at',
        'status'
    ];
    protected $casts = [
        'expires_at' => 'datetime', 
        'starts_at' => 'datetime',
    ];

    public function discountUses()
    {
        return $this->hasMany(DiscountUse::class);
    }
}
