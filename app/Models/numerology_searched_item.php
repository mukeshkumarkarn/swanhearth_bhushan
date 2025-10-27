<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class numerology_searched_item extends Model
{
    use HasFactory;
    protected $table = 'numerology_searched_items';

    protected $fillable = [
        'app_name',
        'usrId',
        'search_name',
        'search_dob',
        'crush_name',
        'crush_dob',
        'ip',
        'totalSum',
        'percentage',
    ];
}
