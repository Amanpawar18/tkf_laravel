<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdsReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'period',
        'period_start', 'period_end',
        'report'
    ];
}
