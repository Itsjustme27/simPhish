<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(), // Checks against known data breaches
            ],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    /**
     * Enhanced user creation with password strength tracking
     */

    protected function create(array $data)
    {
        $passwordStrength = $this->evaluatePasswordStrength($data['password']);
        // dd($passwordStrength);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'password_meets_requirements' => $passwordStrength['meets_requirements'],
            'password_strength_details' => json_encode($passwordStrength['details']),
        ]);

        $user->assignRole('user');
        return $user;
    }

    private function evaluatePasswordStrength($password)
    {
        $requirements = [
            'min_length' => strlen($password) >= 8,
            'has_uppercase' => preg_match('/[A-Z]/', $password),
            'has_lowercase' => preg_match('/[a-z]/', $password),
            'has_numbers' => preg_match('/[0-9]/', $password),
            'has_symbols' => preg_match('/[^A-Za-z0-9]/', $password),
        ];

        $meetsRequirements = array_sum($requirements) === count($requirements);

        return [
            'meets_requirements' => $meetsRequirements,
            'details' => $requirements
        ];
    }

}
