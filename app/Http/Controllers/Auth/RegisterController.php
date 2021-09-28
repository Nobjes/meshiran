<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);
        //exit();
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'birthday' => ['required', 'date'],
            'profile_image_url' => ['nullable', 'string'],
            'sex' => ['required', 'integer'],
            'u_country_id' => ['required','integer'],
            'u_prefecture_id' => ['required','integer'],
            'u_district' => ['nullable','string'],
            'profile_text' => ['nullable', 'string', 'max:150'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'birthday' => $data['birthday'],
            'profile_image_url' =>  $data['profile_image_url'],
            'sex' => $data['sex'],
            'u_country_id' => $data['u_country_id'],
            'u_prefecture_id' => $data['u_prefecture_id'],
            'u_district' => $data['u_district'],
            'profile_text' =>  $data['profile_text'],
            'password' => Hash::make($data['password']),
            
        ]);
        
    }
    
}

