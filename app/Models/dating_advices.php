<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dating_advices extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ref_no',
        'title',
        'short_description',
        'long_description',
        'listing_img',
        'detail_img',
        'slug',
        'meta_title',
        'meta_keyword',
        'meta_title',
        'meta_title',
        'status',
    ];
}
