<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {

        $citys = City::select('id', 'name')->get()->toArray();
        return view('auth.register', compact('citys'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'tc_no' => ['required', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:10', 'max:11'],
            'address' => ['required', 'string', 'min:3', 'max:191'],
            'city' => ['required', 'max:191'],
            'state' => ['required', 'max:191'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ], [
            'name.required' => 'Ad alanı zorunludur.',
            'tc_no.required' => 'TC kimlik numarası alanı zorunludur.',
            'email.required' => 'E-posta adresi alanı zorunludur.',
            'email.unique' => 'Bu e-posta adresi zaten kullanımda.',
            'phone.required' => 'Telefon numarası alanı zorunludur.',
            'address.required' => 'Adres alanı zorunludur.',
            'city.required' => 'Şehir alanı zorunludur.',
            'state.required' => 'İlçe alanı zorunludur.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.confirmed' => 'Şifre doğrulaması uyuşmuyor.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tc_no' => $data['tc_no'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'status' => 1,
            'user_check' => 1,
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole(['user']);
        return $user;
    }
}
