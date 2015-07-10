<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //
        parent::boot($router);

        // Route model binding
//        $router->model('articles', 'App\Article'); // binding the wild card or a route "article" to an instance of App\Article
        // articles is a wild card which shows in artisan Route:list, i.e: articles/{articles}
        // App\Article is the model

        // Could use Route::model(); instead

//        Above is correct but let access to all the article ids, even the not yet published once

//        Custom binding to tackle that showing not yet published articles through the url
        $router->bind('articles', function($id) {
            return \App\Article::published()->findOrFail($id);
        });


        // another route model binding for tags
        $router->bind('tags', function($name) {
            return \App\Tag::where('name', $name)->firstOrFail(); // remember firstOrFail, not FindOrFail
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
