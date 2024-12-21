<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = [
        'title',
        'image_url',
        'submit_date_post',
        'content',
        'category'
    ];
}
