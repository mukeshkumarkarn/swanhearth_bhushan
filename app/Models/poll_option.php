<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poll_option extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'poll_question_id',
        'option_value',
        'user_count',
        'created_at',
        'updated_at',
    ];
}
