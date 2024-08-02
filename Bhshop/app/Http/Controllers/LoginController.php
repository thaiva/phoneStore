<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
 
    function postlogin(Request $request) {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->route('home');
        } else {
            // Authentication failed
            return back()->withErrors(['message' => 'Đăng nhập không thành công.']);
        }
    }
  
    public function postregister(Request $req) {
        $email = $req->input('email');
        $password = $req->input('password');
        $repassword = $req->input('repassword');
        $name = $req->input('name');
        $user = User::where('email', $email)->first();
        if ($password != $repassword) {
            session()->put('message', 'Mật khẩu nhập lại không trùng khớp!');
            return back();
        }    
        // if ($password != $repassword) {
        //     return redirect('/register')->with('message', 'Mật khẩu nhập lại không trùng khớp!');;
        // }        
        if ($user) {
            session()->put('message', 'Email đã tồn tại!');
            return back();
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return redirect()->route('login');}
}
