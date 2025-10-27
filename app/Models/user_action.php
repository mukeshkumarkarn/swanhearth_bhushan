<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_action extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'other_person_user_id',
        'request_mobile_status',
        'like',
        'bookmark',
        'block',
        'request_mobile',
        'request_email',
        'status',
        'like_status',
        'bookmark_status',
        'block_status',
        'request_email_status',
        'email_notification',
        'like_notification',
        'notification',
        'photo_notification',
        'photo_request_status',
        'request_photo',
        'created_at',
        'updated_at',
    ];
}
