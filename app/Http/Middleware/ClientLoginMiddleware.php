<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
class ClientLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::User();
            if($user->maquyen == 2)
                return $next($request); 
            else return redirect()->back()->with(['loiLogin'=>'Bạn phải đăng nhập bằng tài khoản khách hàng']);
        }
        else
        return redirect('dangnhap');
    }
}
