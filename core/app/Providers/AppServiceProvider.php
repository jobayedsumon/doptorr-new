<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        //force ssl
        if (get_static_option('site_force_ssl_redirection') === 'on'){
            URL::forceScheme('https');
        }

        //: this two method are only for loading pagebuilder blade file and menu builder blade file
        $this->loadViewsFrom(__DIR__.'/../../plugins/PageBuilder/views','pagebuilder');
    }
}
