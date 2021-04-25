<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('backend.profile.profile');
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = Auth::guard('admin')->user();

        if (request()->email) {
            $user->email = request()->email;
            $user->save();
        }

        if (request()->password) {

            $this->validate($request, [
                'current_password' => 'required',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required',
            ]);

            $user = Auth::guard('admin')->user();

            if (Hash::check($request->current_password, $user->password)) {
                $user->password = bcrypt($request->password);
                $user->save();
                return back()->with('status', 'Password Updated Successfully');
            } else {
                return back()->with('error', 'Current password is not correct');
            }
        }

        return redirect()->route('admin.profile')->with('status', 'Profile details updated successfully !!');
    }
}
