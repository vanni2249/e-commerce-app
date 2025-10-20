<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Spatie\Translatable\Facades\Translatable;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Available locales
        $availableLocales = ['en', 'es'];
        $defaultLocale = 'es';
        
        $locale = $defaultLocale;
        
        // Check if user is authenticated and has a language preference
        if (Auth::check() && Auth::user()->language) {
            $userLanguage = Auth::user()->language;
            if (in_array($userLanguage, $availableLocales)) {
                $locale = $userLanguage;
                // Update session with user's language preference
                session(['locale' => $locale]);
            }
        } else {
            // Get locale from session for non-authenticated users
            $sessionLocale = session('locale');
            
            // Use session locale if it exists and is valid, otherwise use default
            if ($sessionLocale && in_array($sessionLocale, $availableLocales)) {
                $locale = $sessionLocale;
            } else {
                // Store default locale in session if no valid locale exists
                session(['locale' => $locale]);
            }
        }
        
        // Set Laravel's application locale
        app()->setLocale($locale);
        
        // Set fallback locale for Spatie Translatable
        config(['app.fallback_locale' => $defaultLocale]);
        
        return $next($request);
    }
}
