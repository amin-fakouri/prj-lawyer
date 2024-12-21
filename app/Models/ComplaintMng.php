<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintMng extends Model
{
    protected $fillable = [
        'full_name',
        'complainant',
        'complainee',
        'img',
        'description',
        'submit_date_com',
        'submit_clock_com'
    ];
}
