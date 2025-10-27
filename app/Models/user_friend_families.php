<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_friend_families extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'friend_family_tell_id',
        'user_id',
    ];
}
