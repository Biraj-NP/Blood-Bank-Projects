<?php

namespace App\Providers;

use App\Models\BBMScompany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Model::unguard();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(
            ['components.navbar', 'components.footer'],
            function ($view) {

                $BBMScompanies = BBMScompany::first();

                $view->with('BBMScompanies', $BBMScompanies);
            }
        );
    }
}



