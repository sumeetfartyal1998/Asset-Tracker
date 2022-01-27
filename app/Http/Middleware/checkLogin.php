<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class checkLogin
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
        // $path=$request->path;
        // if(($path=='login') && Session::get('data')){
        //     return redirect('dashboard');
        // }
        $user=session('data');
        if(!empty($user)){
            return $next($request);
        }
        return response()->json(" Please Login !");
        
    }
}
