<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class checkAuth
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
        $response = '';
        if (Auth::check() && (Auth::user()->email_verified_at != NULL))
        {
            return $next($request);
        } else {
            if($request->header('source')){
                $response = 'Unauthorized';
                Toastr::error('Session Expired','Error');
                return response($response);
            }else{
                return redirect('/');
            }
           
        }
       
    }
}
