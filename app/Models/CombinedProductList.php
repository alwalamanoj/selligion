<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCombination;
use App\Models\Product;

class CombinedProductList extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_combination_id',
        'product_id'
    ];

    public function products(){
        return $this->belongsTo(ProductCombination::class, 'product_combination_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
