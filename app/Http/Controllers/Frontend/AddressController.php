<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses =  ShippingAddress::whereUserId(Auth::id())->paginate(10);
        return view('frontend.profile.address.index', compact('addresses'));
    }

    public function create()
    {
        return view('frontend.profile.address.create');
    }

    public function store()
    {
        dd(request()->all());
    }


    public function edit(ShippingAddress $address)
    {
        return view('frontend.profile.address.edit', compact('address'));
    }

    public function update(ShippingAddress $address)
    {
        $address->update(request()->except('user_id'));
        return redirect()->route('frontend.address.index')->with('status', 'Address updated successfully');
    }

    public function destroy(ShippingAddress $address)
    {
        $address->delete();
        return redirect()->route('frontend.address.index')->with('status', 'Address deleted successfully');
    }
}
