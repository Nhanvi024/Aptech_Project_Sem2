<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    // $table->smallInteger('userId')->nullable()->default(null);
    // $table->string('orderName')->nullable()->default(null);
    // $table->string('orderEmail')->nullable()->default(null);
    // $table->string('orderPhone');
    // $table->string('orderAddress')->nullable()->default(null);
    // $table->string('shippingAddress');
    // $table->text('itemsList')->nullable()->default(null);
    // $table->text('note')->nullable()->default(null);
    // $table->decimal('totalCost', 15, 2);
    // $table->decimal('shipping', 15, 2);
    // $table->decimal('finalPrice', 15, 2);
    // $table->string('discountCode')->nullable()->default(null);
    // $table->tinyInteger('status')->default(0);
    // $table->timestamp('orderDate');
    // $table->timestamp('deliveryDate')->nullable()->default(null);
    // $table->string('payment_id', 20);
    // $table->tinyInteger('invoiceStatus')->default(0);
    // $table->timestamps();
    use HasFactory;
    protected $fillable = [
        'userId',
        'orderName',
        'orderEmail',
        'orderPhone',
        'orderAddress',
        'shippingName',
        'shippingPhone',
        'shippingAddress',
        'itemsList',
        'note',
        'totalCost',
        'shipping',
        'finalPrice',
        'discountCode',
        'status',
        'orderDate',
        'deliveryDate',
        'payment_id',
        'invoiceStatus'
    ];
    protected function casts(): array
    {
        return [
            'itemsList' => 'array',
        ];
    }
}
