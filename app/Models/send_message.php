<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class send_message extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'other_person_user_id',
        'message',
        'status',
        'message_time',
        'created_at',
        'updated_at',
    ];
}
