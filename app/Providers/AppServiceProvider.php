<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

use App\Http\Composers\Indicator\EuropeComposer;
use App\Http\Composers\Indicator\UkraineComposer;

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

        // indicators
        View::composer('_partials.indicators.eu', EuropeComposer::class);
        View::composer('_partials.indicators.ua', UkraineComposer::class);
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
