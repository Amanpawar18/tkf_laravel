<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestWithdrawal extends Model
{
    use HasFactory;

    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    const STATUS_PROCESSED = 2;
    const STATUS_COMPLETED = 3;
    const STATUS_DECLINE = 4;

    protected $fillable = [
        'user_id',
        'status', 'amount',
        'acc_holder_name', 'acc_number',
        'bank_name', 'ifsc_code', 'branch_name',
        'transfer_bank_name', 'transfer_transaction_id',
        'transfer_date', 'requested_amount', 'tds_amount'
    ];

    protected static function boot()
    {
        parent::boot();

        $url = url()->current();
        static::addGlobalScope('hasUser', function (Builder $builder) {
            $builder->whereHas('user');
            $builder->orderBy('id', 'DESC');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute()
    {
        $status = 'Pending';
        if ($this->status == self::STATUS_APPROVED) {
            $status = 'Approved';
        } else if ($this->status == self::STATUS_PROCESSED) {
            $status = 'Processed';
        } else if ($this->status == self::STATUS_COMPLETED) {
            $status = 'Completed';
        } else if ($this->status == self::STATUS_DECLINE) {
            $status = 'Decline';
        }
        return $status;
    }
}
