<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CombinedProductList;

class ProductCombination extends Model
{
    use HasFactory;
    protected $fillable = [
        'combination_name',
        'combination_description',
        'combination_img_path',
        'combination_discount_price',
        'status',
    ];
    public function products(){
        return $this->hasMany(CombinedProductList::class);
    }
}
