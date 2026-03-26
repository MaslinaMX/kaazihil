<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el sitio está en modo mantenimiento
        // Maneja tanto booleano como string
        $maintenanceMode = env('SITE_MAINTENANCE_MODE') === true || 
                          env('SITE_MAINTENANCE_MODE') === 'true';
        
        if ($maintenanceMode) {
            return response()->view('maintenance', [], 503);
        }

        return $next($request);
    }
}
