<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address_line_1',
        'address_line_2',
        'city',
        'zipcode',
        'country',
        'user_id',
        'pan_number',
        'gst_number',
    ];
}
