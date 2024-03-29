<?php

namespace App\Actions\Fortify;

use App\Models\Cart;
use App\Models\User;
use App\Rules\ReferrerUserRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'referrer_user_code' =>  new ReferrerUserRule()
        ])->validate();


        $user = User::create([
            'name' => $input['name'],
            'phone_no' => $input['phone_no'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user->createReferralId();
        $user->assignCartProducts();
        $user->assignReferredUser(request()->referrer_user_code);

        return $user;
    }
}
