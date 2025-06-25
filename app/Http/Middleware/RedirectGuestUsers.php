<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectGuestUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if not the user is authenticated as an user
        // if (!Auth::guard('web')->check()) {
        //     return redirect()->route('login');
        // }
        // Check if not the user is authenticated as an seller
        // if (!Auth::guard('seller')->check()) {
        //     return redirect()->route('sellers.login');
        // }
        // Check if not the user is authenticated as an admin
        // if (!Auth::guard('admin')->check()) {
        //     return redirect()->route('admin.login');
        // }
        return $next($request);
    }
}
