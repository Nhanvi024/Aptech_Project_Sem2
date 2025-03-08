<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;

    // $table->string('proName');
    // $table->decimal('proPrice', 10, 2);
    // $table->decimal('proStock', 10, 2);
    // $table->smallInteger('proDiscount')->default(0);
    // $table->boolean('proStatus')->default(true);
    // $table->string('proImageURL');
    // $table->text('proDescription');
    // $table->foreignId('cate_id')->constrained('categories')->onDelete('cascade');
    protected $fillable = ['proName', 'proCost', 'proPrice', 'proSeason', 'proOrigin', 'proStock', 'proDiscount', 'proActive', 'proSaleStatus', 'proImageURL', 'proDescription', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected function casts(): array
    {
        return [
            'proImageURL' => 'array',
        ];
    }
}
