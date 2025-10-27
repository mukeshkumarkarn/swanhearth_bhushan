<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_ref',
        'name',
        'email',
        'password',
        'state',
        'city',
        'pincode',
        'current_latitude',
        'current_longitute',
        'latitude',
        'longitute',
        'notification',
        'social_type',
        'social_id',
        'status',
        'gender',
        'profile_img',
        'ip_address',
        'email_verification',
        'email_verified_at',
        'conf_email',
        'profileShow_hide',
        'email_show_hide',
        'mobile_show_hide',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
