<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    // sử  dụng kiến thức matter layout xây dựng trong login và register

    public function showLoginForm(){
        return view('auth.login');
    }
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function login(Request $req){
        $data = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt($data)){
            // dd(Auth::user());
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['email' => "tt đăng nhập ko chỉnh xác"]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with('success', 'Đăng xuất thành công');
    }

    public function register(Request $req){
        $data = $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
        // dd($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => User::ROLE_USER,
        ]);
        // Nếu tạo tài khoản thành công thì gửi mail chào mừng
        if($user){
            // Mail::to($user->email)->send(new WelcomeMail($user));

            // sử dụng queue với laravel 12 nó đã tích hợp sắn
            // tôi chỉ cần chạy câu lệnh " php artisan queue:work" để kích hoạt nó
            // song song với php artisan ser
            Mail::to($user->email)->queue(new WelcomeMail($user));
        }
        Auth::login($user); 
        return redirect()->route('admin.dashboard');
    }
}
