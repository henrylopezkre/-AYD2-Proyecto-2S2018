<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UpdateUser extends Controller
{
    //
    protected function update_user(Request $request)
    {

    	$validatedData = $request->validate([
    		'fullname' => 'required|string|max:100',
            'username' => 'required|string|min:5|max:50',
            //'email' => 'required|string|email|max:60|unique:user',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'integer|between:1,100',
            'gender' => 'boolean',
            'photo' => '',
            'photo.*' => 'mimes:jpeg,jpg,png,gif',
            'comment' => 'max:250'
		]);

	    //$request= \Request::capture();

        
        $image = $request->file('photo');
        $input = null;
        if(isset($image)){
            $input = uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/photo');
            $image->move($destinationPath, $input);
        }

        $user = Auth::user();

    	$user->fullname = $request->fullname;
        $user->password = Hash::make($request->password);
        $user->username = $request->username;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->photo = ($input == null)? Auth::user()->photo: $input;
        $user->comment = $request->comment;

        //$user->update();
        $user->save();
        return Redirect::to('user/updateprofile');
    }

}
