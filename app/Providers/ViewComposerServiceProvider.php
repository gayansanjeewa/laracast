<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // need to register in the config/app.php though
//        view()->composer('partials.nav', function ($view) {
//            $view->with('latest', Article::latest()->first());
//        });

//        view()->composer('partials.nav', function ($view) {
//            $view->with('latest', Article::latest()->first());
//        });

//        view()->composer('partials.nav', function ($view) {
//            $view->with('latest', Article::latest()->first());
//        });

//        view()->composer('partials.nav', function ($view) {
//            $view->with('latest', Article::latest()->first());
//        });

        // above can refactor into a function, so much cleaner and can have multiple functions for separate view-composers
        $this->composeNavigation();

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

    /**
     *Compose the navigation bar
     */
    public function composeNavigation()
    {
        view()->composer('partials.nav', function ($view) {
            $view->with('latest', Article::latest()->first());
        });
    }
}
