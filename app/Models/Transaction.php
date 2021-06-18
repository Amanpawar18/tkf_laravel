<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const TYPE_CREDIT =1;
    const TYPE_DEBIT =2;

    protected $fillable = ['user_id', 'amount', 'type', 'message'];

    public function getTypeTextAttribute()
    {
        $type = 'Credit';
        if($this->type == self::TYPE_DEBIT){
            $type = 'Debit';
        }
        return $type;
    }
}
