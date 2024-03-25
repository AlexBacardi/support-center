<?php

namespace App\Providers;

use App\View\Composers\Admin\CountAllOtherRequestComposer;
use App\View\Composers\Admin\CountAllRequestComposer;
use App\View\Composers\CountRequestComposer;
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
        view()->composer('layouts.main', CountRequestComposer::class);

        view()->composer('layouts.admin_main', CountAllRequestComposer::class);

        view()->composer('layouts.admin_main', CountAllOtherRequestComposer::class);
    }
}
