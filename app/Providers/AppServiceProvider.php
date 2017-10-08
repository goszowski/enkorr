<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('Store', 'App\Runsite\Libraries\Store');
        View::composer('layouts.main', 'App\Http\Composers\GlobalComposer');
        View::composer('partials.publications', 'App\Http\Composers\WidgetComposer');
        View::composer('partials.allpolls', 'App\Http\Composers\PollComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
