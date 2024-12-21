<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'complainant',
        'complainee',
        'img',
        'description',
        'submit_date_com',
        'submit_clock_com'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
