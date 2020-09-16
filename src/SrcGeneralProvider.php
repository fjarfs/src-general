<?php

namespace Fjarfs\SrcGeneral;

use Illuminate\Support\ServiceProvider;

class SrcGeneralProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Fjarfs\SrcGeneral\Helpers\Access');
    }
}
