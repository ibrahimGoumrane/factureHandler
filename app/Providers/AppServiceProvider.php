<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('mainNavigation.index', 'mainNav');
        Blade::component('homeNotLoggedIn.AboutUs', 'AboutUs');
        Blade::component('homeNotLoggedIn.hero', 'heroNotLoggedIn');
        Blade::component('homeNotLoggedIn.contactUs', 'contactUs');
        Blade::component('homeNotLoggedIn.footer', 'footerNotLoggedIn');

        Model::unguard();
    }
}
