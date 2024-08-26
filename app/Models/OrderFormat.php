<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFormat extends Model
{
    use HasFactory;
    protected $fillable = ['custom_format'];
}
