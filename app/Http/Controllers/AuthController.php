<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function register(Request $req)
    {
    	$users = new User;
    	$users->create([
    		'name' => $req->name,
    		'email'=> $req->email,
    		'password' => Hash::make($req->pswd),
    	]);

    	return redirect()->back();
    }

    public function login(Request $req){
    	if (Auth::attempt([
    		'email' => $req->email,
    		'password' =>$req->pswd
    	])) {
    		return redirect('/home');
    	}else{
	    	return redirect()->back();
    	}
    }

    public function logout()
    {
    	if (Auth::check()) {
    		Auth::logout();
    		return redirect('/');
       	}
    }
}
