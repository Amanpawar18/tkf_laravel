<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Password;
use Auth;
use Session;
use App\Model\Admin;
use App\Models\PasswordReset;
use Illuminate\Validation\Rule;

class AdminResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('auth.passwords.admin-reset')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }


    //defining which guard to use in our case, it's the admin guard
    protected function guard()
    {
        return Auth::guard('admin');
    }

    //defining our password broker function
    protected function broker() {
        return Password::broker('admins');
    }


    public function update_password(Request $request) {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $hash_token = PasswordReset::where('email',$request->email)->latest()->first();
        if(isset($hash_token->token)){
            $result = Hash::check($request->token,$hash_token->token);

            if($result){
                $this->validate($request, [
                    'email' => [ Rule::in([$request->email]) ]
                ]);
                $admin = Admin::where('email',$request->email)->first();
                    $admin->password = bcrypt($request->password);
                    $admin->save();
                    Session::put('password-status', 'Password Updated Successfully.');
                    Auth::logout();
                    return redirect()->route('adminLogin');
            }
            else{
                // Session::put('error','Email Id is not correct');
                return back()->with('error', 'Email id is not correct');;
            }

        }
        else{
            // Session::put('error','Email Id is not correct');
            return back()->with('error', 'Email id is not correct');
        }
    }

}
