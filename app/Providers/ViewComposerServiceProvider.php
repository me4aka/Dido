<?php

namespace App\Providers;

use App\Album;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('images.webheader', function($view)
        {
            $view->with('albums_list', Album::all());
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
