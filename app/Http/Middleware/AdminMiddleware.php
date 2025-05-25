<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // nếu khoogn đăng nhập và ko phải là admin thì không đc phép truy cập
        if(!Auth::check() || !Auth::user()->isRoleAdmin()){
            return redirect()->route('home')->with('error','Bạn Ko Có Quyền Truy Cập Vào Trang Này');
        }
        return $next($request);
    }
}
