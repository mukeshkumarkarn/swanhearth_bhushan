<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stories_dating extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ref_no',
        'title',
        'summary',
        'details',
        'listing_img',
        'detail_img',
        'slug',
        'meta_title',
        'meta_keyword',
        'meta_title',
        'meta_title',
        'status',
        'publish_date',
    ];
}
