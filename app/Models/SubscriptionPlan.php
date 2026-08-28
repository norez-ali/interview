<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $fillable = [
        'name',
        'monthly_price',
    ];

    protected $casts = [
        'monthly_price' => 'decimal:2',
    ];
}
