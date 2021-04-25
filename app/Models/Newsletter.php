<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $table = 'news_letters';
    protected $fillable = [
        'email'
    ];


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderByDesc', function (Builder $builder) {
            $builder->orderBy('id', 'Desc');
        });
    }
}
