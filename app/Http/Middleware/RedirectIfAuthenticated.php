<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //if (Auth::guard($guard)->check()) でログインしているかどうかを判断
        if (Auth::guard($guard)->check()) {
            //ログイン済みの場合は RouteServiceProvider::HOME にリダイレクトさせています。
            //リダイレクト先はユーザ登録成功後と同じです。
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
