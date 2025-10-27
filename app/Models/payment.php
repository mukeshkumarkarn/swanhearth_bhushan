<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'subscription_plan',
        'subscription_start_date',
        'subscription_end_date',
        'fee',
        'order_id',
        'transaction_id',
        'status',
        'created_at',
        'updated_at',
    ];

}
