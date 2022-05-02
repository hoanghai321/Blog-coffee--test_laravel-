<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $checkrole = auth()->user()->role;
        if($checkrole == "admin"){
            return $next($request);
        }
        else{
            return response()->view('User.Index');
        }
        
    }
}
