<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preferred_match extends Model
{
    use HasFactory;

    protected $table="preferred_matchs";

    protected $fillable = [
        'id',
        'user_id',
        'high_qualification_id',
        'pincode',
        'state',
        'city',
        'marital_status_id',
        'religion_id',
        'created_at',
        'updated_at',
        'height',
        'Inch',
    ];
}
