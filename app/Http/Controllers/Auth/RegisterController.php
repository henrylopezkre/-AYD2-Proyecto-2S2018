<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
            'fullname' => 'required|string|max:100',
            'username' => 'required|string|min:5|max:50',
            'email' => 'required|string|email|max:60|unique:user',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'integer|between:1,100',
            'gender' => 'boolean',
            'photo' => '',
            'photo.*' => 'mimes:jpeg,jpg,png,gif',
            'comment' => 'max:250'
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
        $request= \Request::capture();

        
        $image = $request->file('photo');
        $input = null;
        if(isset($image)){
            $input = uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/photo');
            $image->move($destinationPath, $input);
        }


        return User::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'photo' => $input,
            'comment' => $data['comment'],
        ]);
    }

}
