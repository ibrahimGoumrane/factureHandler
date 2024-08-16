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
        Blade::component('homeNotLoggedIn.index', 'index');
        Blade::component('homeNotLoggedIn.hero', 'heroNotLoggedIn');
        Blade::component('homeNotLoggedIn.contactUs', 'contactUs');
        Blade::component('homeNotLoggedIn.footer', 'footerNotLoggedIn');
        Blade::component('caisse.create', 'caisse-create');
        Blade::component('caisse.monthFilter', 'caisse-filter');
        Blade::component('caisse.update', 'caisse-update');
        Blade::component('caisse.totalMonth', 'caisse-total');
        Blade::component('team.member', 'team-member');
        Blade::component('team.admin', 'team-admin');
        Blade::component('team.index', 'team-index');
        Blade::component('admin.dashboard', 'adminDashboard');
        Blade::component('admin.dashboardCellule', 'adminDashboardCellule');
        Blade::component('admin.dashboardRole', 'adminDashboardRole');

        Blade::component('admin.updateUser', 'adminUpdateUser');
        Blade::component('admin.updateCellule', 'adminUpdateCellule');
        Blade::component('admin.updateRole', 'adminUpdateRole');
        Model::unguard();
    }
}
