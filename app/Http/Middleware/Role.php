<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
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
        $checklogin = Auth::check();
        if($checklogin){
            if(auth()->user()->role == 'user'){
                return response()->view('User/Index');
            }
            else{
                // return response()->redirectTo('api/category');
                return response()->view('Admin.home');
            }
        }
        else{
            return redirect('/login');
        }
       
    }
}
