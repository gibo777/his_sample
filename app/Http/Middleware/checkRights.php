<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkRights
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
        if($request->header('rights') == 'F'){
            return $next($request);
        }else{
            return response(['hasAccess' => false, 'message' => 'You do not have rights for this process.']);
        }
        
    }
}
