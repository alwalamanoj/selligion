<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitedTimeOffer extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'offer_title',
        'offer_description',
        'offer_quantity',
        'items_sold',
        'offer_price',
        'offer_start_date',
        'offer_end_date',
        'is_activated',
    ];

}
