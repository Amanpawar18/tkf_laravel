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
        // 'last_name',
        'status',
        // 'first_name',
        'phone_no',
        'pan_no',
        'pan_front_image',
        'pan_back_image',
        'aadhaar_no',
        'aadhaar_front_image',
        'aadhaar_back_image',
    ];

    protected $guarded = [
        'referral_code',
        'referrer_user_id',
        'referrer_user_code',
        'wallet_balance',
        'acc_holder_name',
        'acc_number',
        'bank_name',
        'ifsc_code',
        'branch_name',
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
        return $this->hasMany(User::class, 'referrer_user_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function addresses()
    {
        return $this->hasMany(ShippingAddress::class);
    }

    public function requestWithdrawals()
    {
        return $this->hasMany(RequestWithdrawal::class);
    }

    public function referrerUser()
    {
        return $this->belongsTo(User::class, 'referrer_user_id', 'id');
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
            'referral_code' => str_replace(' ', '-', $this->name) . '-' . $this->id
        ]);
        $this->save();
        return true;
    }

    public function assignReferredUser($referrerCode = null)
    {

        $referrerUser = User::whereReferralCode($referrerCode)->first();
        $this->referrer_user_id = isset($referrerUser) ? $referrerUser->id : null;

        $this->forceFill([
            'referrer_user_code' =>  $referrerCode,
            'referrer_user_id' => isset($referrerCode) && isset($referrerUser)  ? $referrerUser->id : null,
        ]);
        $this->save();

        return true;
    }

    public function getWalletBalanceTextAttribute()
    {
        $text = '₹ ' . $this->wallet_balance;
        return $text;
    }

    public function createTransaction($userId, $amount = 0, $message = 'N/A', $type = Transaction::TYPE_CREDIT)
    {
        $data['message'] = $message;
        $data['type'] = $type;
        $data['amount'] = $amount;
        $data['user_id'] = $userId;
        Transaction::create($data);
        return true;
    }

    public function createTdsTransaction($userId, $amount = 0)
    {
        $data['amount'] = $amount;
        $data['user_id'] = $userId;
        $data['period_start'] = TdsTransaction::getCurrentPeriodStart();
        $data['period_end'] = TdsTransaction::getCurrentPeriodEnd();
        $data['period'] =  $data['period_start'] . ' - ' . $data['period_end'] ;
        TdsTransaction::create($data);
        return true;
    }

    public function giveReferralAmount($amount, $product)
    {
        $referrerUser = $this->referrerUser;

        if ($product->referral_percent > 0) {

            $referralAmount = $amount * ($product->referral_percent  / 100);
            $referrerUser->createTransaction($referrerUser->id, $referralAmount, 'Referral purchase of ' . $product->name);

            $referrerUser->forceFill([
                'wallet_balance' => $referrerUser->wallet_balance + $referralAmount
            ]);
            $referrerUser->save();
        }
        return $this;
    }

    public function getPanFrontImagePathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');

        if (
            file_exists(public_path(env('USER_IMAGE_PATH') . $this->pan_front_image))
            && is_file(public_path(env('USER_IMAGE_PATH') . $this->pan_front_image))
        )
            $path = asset(env('USER_IMAGE_PATH') . $this->pan_front_image);

        return $path;
    }

    public function getPanBackImagePathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');

        if (
            file_exists(public_path(env('USER_IMAGE_PATH') . $this->pan_back_image))
            && is_file(public_path(env('USER_IMAGE_PATH') . $this->pan_back_image))
        )
            $path = asset(env('USER_IMAGE_PATH') . $this->pan_back_image);


        return $path;
    }

    public function getAadhaarFrontImagePathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');

        if (
            file_exists(public_path(env('USER_IMAGE_PATH') . $this->aadhaar_front_image))
            && is_file(public_path(env('USER_IMAGE_PATH') . $this->aadhaar_front_image))
        )
            $path = asset(env('USER_IMAGE_PATH') . $this->aadhaar_front_image);


        return $path;
    }

    public function getAadhaarBackImagePathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');

        if (
            file_exists(public_path(env('USER_IMAGE_PATH') . $this->aadhaar_back_image))
            && is_file(public_path(env('USER_IMAGE_PATH') . $this->aadhaar_back_image))
        )
            $path = asset(env('USER_IMAGE_PATH') . $this->aadhaar_back_image);


        return $path;
    }

    public static function getTdsDeductionAmount($amount)
    {
        $tdsAmount = 0;
        if (Setting::get('tds_percent') &&  Setting::get('tds_percent') > 0) {
            $tdsAmount = $amount * (Setting::get('tds_percent') / 100);
        }
        return $tdsAmount;
    }
}
