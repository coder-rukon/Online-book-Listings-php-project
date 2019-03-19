<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use App\User;
use Auth;
class Users extends Controller
{
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
	           'email' => 'required|email',
	           'password' => 'required|max:50',
	       ]);
    	$output = [
    		"resultType" => false,
    		"message" => null,
    	];
	    if($validator->fails()){
	    	$output['message'] = $validator->messages()->first();
	    }else{
			$credentials = $request->only('email', 'password');

			if (Auth::attempt($credentials)) {
				$output['resultType'] = true;
				$output['message'] = "Login Success!";
			}else{
				$output['message'] = "User name or Passord is not found! please try again.";
			}
	    }
	    return json_encode($output);
    }
    public function logout(Request $request){
    	Auth::logout();
    	return redirect('/');
    }
    
    public function Register(Request $request){
    	 $validator = Validator::make($request->all(), [
	           'email' => 'required|email',
	           'name' => 'required|string|max:50',
	           'password' => 'required|confirmed|max:50',
	           'password_confirmation' => ""
	       ]);
    	$output = [
    		"resultType" => true,
    		"message" => null,
    	];
	    if($validator->fails()){
	    	$output['resultType'] = false;
	    	$output['message'] = $validator->messages()->first();
	    }else{
    		$user = new User($request->all());
    		$user->password =  Hash::make($request->password);
    		$user->save();
    		$output['resultType'] = true;
	    	$output['message'] = "Registration Success. Please wiat or reload the page.";
	    	$output['usreId'] =$user->id;
	    	Auth::login($user);
	    }
	    return json_encode($output);
    }


}
