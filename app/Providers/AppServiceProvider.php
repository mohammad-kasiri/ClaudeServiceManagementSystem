<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        ////Public folder name changed with public_html
        $this->app->bind('path.public', function() {
            return base_path('public_html');
        });
        $this->app->bind('path.public', function() {
            return base_path().'/../public_html';
        });
    }


    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.metronic');
    }
}
