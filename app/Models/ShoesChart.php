<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoesChart extends Model
{
    use HasFactory;

    protected $table = 'shoes_sizes';

    protected $fillable = [
        'US_size', 'EU_size', 'UK_size', 'cm'
    ];
}
