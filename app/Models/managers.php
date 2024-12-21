<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class managers extends Model
{
    protected $fillable = [
        'full_name',
        'phone_number',
        'about',
        'image_url',
        'submit_date_post',
        'koms'
    ];
}
