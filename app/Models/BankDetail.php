<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'acc_holder_name',
        'acc_number', 'bank_name',
        'ifsc_code', 'branch_name'
    ];
}
