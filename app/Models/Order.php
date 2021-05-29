<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PAYMENT_COMPLETED=1;
    const PAYMENT_FAILED=0;
    const PAYMENT_WAITING=2;

    const ORDER_STATUS_REJECTED =0;
    const ORDER_STATUS_APPROVED =1;

    protected $fillable = [
        'user_id', 'order_status',
        'payment_status', 'stripe_payment_id',
        'address_id', 'total_amount',
        'razorpay_order_id', 'razorpay_payment_id',
        'razorpay_signature',
    ];

    protected $guarded = [
        'delhivery_waybill', 'delhivery_refnum',
        'delhivery_upload_wbn'
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


    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class, 'address_id', 'id');
    }

    public function getStatusTextAttribute()
    {
        $text = 'Approved';

        if($this->order_status == self::ORDER_STATUS_APPROVED){
            $text = 'Approved';
        } elseif($this->order_status == self::ORDER_STATUS_REJECTED){
            $text = 'Rejected';
        }
        return $text;
    }

    public function getPaymentStatusTextAttribute()
    {
        $text = 'Completed';

        if($this->payment_status == self::PAYMENT_COMPLETED){
            $text = 'Completed';
        } elseif($this->payment_status == self::PAYMENT_FAILED){
            $text = 'Failed';
        } elseif($this->payment_status == self::PAYMENT_WAITING){
            $text = 'Waiting';
        }
        return $text;
    }

    public function delete()
    {
        $this->orderProducts()->delete();
        parent::delete();
        return true;
    }

}
