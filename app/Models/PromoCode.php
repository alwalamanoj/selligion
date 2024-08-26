<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;
    protected $casts = [
        'start_date' => 'datetime',
    ];
    protected $fillable = [
        'promocode',
        'discount_price',
        'validity',
        'start_date',
    ];
    public function isExpiredOrNotStarted(): bool
    {
        $startDate = $this->start_date;
        $validityInDays = $this->validity;

        if ($startDate->gt(now())) {
            // Promo code not started yet
            return true;
        }

        $expirationDate = $startDate->addDays($validityInDays);

        return now()->gt($expirationDate);
    }
}
