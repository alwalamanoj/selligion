<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'price',
        'order_id',
        'taxable_amount',
        'total_tax',
        'promo_discount',
        'combo_discount',
        'tax_percentage',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
