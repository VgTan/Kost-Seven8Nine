<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::has('loginId')){
            return back();
        }
        else {
            return $next($request);
        }
    }

}