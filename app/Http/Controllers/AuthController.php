<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{
    public function check(array $data)
    {
        $messages = [
            'name.required'              => 'Nama tidak boleh kosong',
            'name.min'                   => 'Nama tidak boleh kurang dari 5 karakter',
            'name.max'                   => 'Nama tidak boleh lebih dari 20 karakter',
            'email.required'             => 'Email tidak boleh kosong',
            'email.email'                => 'Format Email tidak valid',
            'email.unique'               => 'Email yang anda masukkan telah digunakan',
            'pswd.required'              => 'Password tidak boleh kosong',
            'pswd.min'                   => 'Password harus minimal 8 karakter',
            'pswd.regex'                 => 'Format password harus terdiri dari kombinasi huruf besar, angka dan karakter spesial (contoh:!@#$%^&*?><).',
            'pswd-confirmation.same'     => 'Password tidak sama!',
            'pswd-confirmation.required' => 'Password Confirmation tidak boleh kosong',
        ];

        $validator = Validator::make($data, [
            'name'     => 'required|min:5|max:20',
            'email'    => 'required|email|unique:users',
            'pswd'     =>  'required|min:8|regex:/^(?=\S*[a-z])(?=\S*[!@#$&*])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
            'pswd-confirmation' => 'required|same:pswd'
        ], $messages);

        return $validator;
    }

    public function register(Request $req)
    {
        $validator = $this->check($req->All());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // send back all errors to the register form
                ->withInput();
        }else{
        	$users = new User;
        	$users->create([
        		'name' => $req->name,
        		'email'=> $req->email,
        		'password' => Hash::make($req->pswd),
        	]);
        	return redirect()->back();
        }
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
    		return redirect('/home');
       	}
    }
}
