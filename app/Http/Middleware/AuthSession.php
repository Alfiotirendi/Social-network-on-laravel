<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthSession
{

    public function handle(Request $request, Closure $next)
    {
        
        if (!$request->session()->has('id')) {
            return redirect()->route('LoginForm')->with('error', 'Devi accedere prima.');
        }
        return $next($request);
    }
}