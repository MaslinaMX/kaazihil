<?php

namespace App\View\Composers;

use Illuminate\View\View;

class MaintenanceModeComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $maintenanceMode = env('SITE_MAINTENANCE_MODE') === true || 
                           env('SITE_MAINTENANCE_MODE') === 'true';
        
        $view->with('maintenanceMode', $maintenanceMode);
    }
}
