<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get locale from query parameter or session
        $locale = $request->query('locale', session('locale'));

        // Validate locale is in allowed list
        $allowedLocales = ['es', 'en'];
        if (!in_array($locale, $allowedLocales)) {
            $locale = config('app.locale');
        }

        // Set the application locale
        app()->setLocale($locale);

        // Store in session for persistence
        if ($request->query('locale')) {
            session(['locale' => $locale]);
        }

        return $next($request);
    }
}
