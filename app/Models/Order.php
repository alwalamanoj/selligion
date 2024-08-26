<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductCombination;
use App\Models\Address;
use App\Models\PromoCode;
use App\Models\Payment;
use App\Models\OrderedProduct;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'promo_code_id',
        'user_id',
        'product_id',
        'product_combination_id',
        'amount',
        'address_id',
        'payment_id',
        'custom_order_id',
        'invoice_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function productCombination()
    {
        return $this->belongsTo(ProductCombination::class, 'product_combination_id');
    }
    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
    public function orderedProducts()
    {
        return $this->hasMany(OrderedProduct::class);
    }
}
