<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class Admin extends Controller
{
    public function Index(){
        return view('admin.dashboard');
    }
    public function Users(){
        $bodyData['users'] = User::orderBy('id',"DESC")->paginate(10);
        return view('admin.users',$bodyData);
    }

    public function DeleteUser($id){
        $user = User::find($id);
        $name = $user->name;
        $user->delete();
       return  redirect()->route('admin.users')->with(['message'=>"The user '".$name."' is Deleted"]);
    }
}
