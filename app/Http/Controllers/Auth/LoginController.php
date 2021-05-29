<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\SocialLoginData;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\Model\User;

class LoginController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        $socialLoginData = SocialLoginData::first();
        return view('frontend.auth.login', compact('socialLoginData'));
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $remember_me = $request->has('remember') ? true : false;
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            //user sent their email
            Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password], $remember_me);
        } else {
            //they sent their username instead
            Auth::guard()->attempt(['username' => $request->email, 'password' => $request->password], $remember_me);
        }
        if (Auth::guard()->check()) {

            $user = auth()->user();
            if ($user->email_verified_at != null) {
                // dd(method_exists($this, 'redirectTo'), $this->redirectPath() , $this);
                if ($user->status == 1) {
                    $this->assignCartProducts();
                    if ($user->role == User::Seller) {
                        $this->redirectTo = route('seller.dashboard');
                    } else {
                        $this->redirectTo = route('frontend.home');
                    }
                    return redirect()->intended($this->redirectPath());
                } else {
                    Auth::logout();
                    return back()->with('error', 'You account has been temporary deactivated');
                }
            } else {
                Auth::logout();
                return redirect()->route('login')->with('verification-error', 'First Verify your email Address');
            }
        } else {
            return back()->with('error', 'Incorrect email-id or password');
        }
    }

    public function assignCartProducts()
    {
        $sessionId = session('userCartSessionId');
        if ($sessionId) {
            $cartItems = Cart::whereSessionId($sessionId)->update(['user_id' => Auth::id()]);
        }
        return true;
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
}
