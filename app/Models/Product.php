<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tax;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\CombinedProductList;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'quantity',
        'tax_id',
        'category_id',
        'sku',
        'slug',
        'status',
        'addOn',
        'hsn_sac_code',
    ];

    public function tax(){
        return $this->belongsTo(Tax::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function combinedProducts(){
        return $this->hasMany(CombinedProductList::class);
    }

    public function limitedTimeOffers(){
        return $this->hasMany(LimitedTimeOffer::class);
    }
}
