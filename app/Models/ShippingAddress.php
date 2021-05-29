<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    const ACTIVE = 1;
    const HIDDEN = 0;

    protected $fillable = [
        'user_id', 'first_name', 'last_name',
        'address', 'apartment_no', 'city',
        'country', 'state', 'pin_code', 'phone_no',
        'email', 'status',
    ];

    public function getAddressInTextAttribute()
    {
        $address = '';
        $address .= 'Name: ' . $this->first_name . ' ' .  $this->last_name . ' | Email: ' . $this->email;
        $address .= '</br>';
        $address .= 'Phone-no: ' . $this->phone_no;
        $address .= '</br>';
        $address .= 'Address: ' . $this->apartment_no . ', ' .   $this->address;
        // $address .= 'Address: ' .   $this->address;
        $address .= '</br>';
        $address .= $this->city . ', ' .  $this->state . ', ' .  $this->country;
        return $address;
    }

    public function getAddressInStringAttribute()
    {
        $address =  $this->address . ', ' .   $this->apartment_no . ', ';
        $address .= $this->city . ', ' .  $this->state;
        return $address;
    }
}
