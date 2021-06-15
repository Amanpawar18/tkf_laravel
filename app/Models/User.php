<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ACTIVE = 1;
    const HIDDEN = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'status',
        'first_name',
        'phone_no',
    ];

    protected $guarded = [
        'referral_code',
        'referrer_user_id',
        'referrer_user_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function referredUsers()
    {
        return $this->hasMany(User::class, 'referrer_user_id', 'id') ;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function addresses()
    {
        return $this->hasMany(ShippingAddress::class)->whereStatus(ShippingAddress::ACTIVE);
    }

    public function delete()
    {
        $this->orderProducts()->delete();
        $this->orders()->delete();
        parent::delete();
        return true;
    }


    public function assignCartProducts()
    {
        $sessionId = session('userCartSessionId');
        if ($sessionId) {
            $sessionCartItems = Cart::whereSessionId($sessionId)->get();

            foreach ($sessionCartItems as $cartItem) {
                Cart::firstOrCreate([
                    'user_id' => $this->id,
                    'session_id' => null,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'variation_id' => $cartItem->variation_id,
                ]);
                $cartItem->delete();
            }
        }

        session()->forget('userCartSessionId');
        return true;
    }

    public function createReferralId()
    {
        $this->forceFill([
            'referral_code' => $this->first_name . '-' . $this->id
        ]);
        $this->save();
        return true;
    }

    public function assignReferredUser($referrerCode = null)
    {

        $referrerUser = User::whereReferralCode($referrerCode)->first();
        $this->referrer_user_id = isset($referrerUser) ? $referrerUser->id : null;

        $this->forceFill([
            'referral_code' =>  $referrerCode,
            'referrer_user_id' => isset($referrerCode) && isset($referrerUser)  ? $referrerUser->id : null,
        ]);
        $this->save();

        return true;
    }
}
