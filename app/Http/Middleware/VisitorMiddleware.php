<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('visitor-session')) {

            if (Auth::check())
            {
                $visitor = Visitor::where('session_id', session()->get('visitor-session'))->first();
                if ($visitor && !$visitor->user_id) {
                    $visitor->user_id = Auth::id();
                    $visitor->save();
                }
            }
            // return $next($request);

        }else {
            session()->put('visitor-session', session()->getId());

            Visitor::firstOrCreate(
                ['session_id' => session()->getId()],
                ['user_id' => null]
            );
        }


        return $next($request);
    }
}
