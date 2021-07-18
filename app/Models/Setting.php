<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const TDS_PERIOD_YEARLY = 1;
    const TDS_PERIOD_HALF_YEARLY = 2;
    const TDS_PERIOD_QUARTERLY = 3;
    const TDS_PERIOD_MONTHLY = 4;

    public static function get($key)
    {
        $object = self::where('key', $key)->first();
        $value = $object->value;
        return $value;
    }
}
