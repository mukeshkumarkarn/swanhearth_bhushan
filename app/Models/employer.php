<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'emp_ref',
        'first_name',
        'last_name',
        'email',
        'password',
        'employer_mobile',
        'admin_employee',
        'status',
        'admin_employee',
        'gender',
    ];
}
