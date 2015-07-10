<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', 'PagesController@contact');

//Route::get('about', 'PagesController@about'); // without authentication
Route::get('about', ['middleware'=>'auth', 'uses'=>'PagesController@about']); //With authentication

// Middleware without a controller
Route::get('test', ['middleware'=>'auth', function() {
    return 'this page will only displayed once the user is logged in :)';
}]);


//Route::get('articles', 'ArticlesController@index');
//Route::get('articles/create', 'ArticlesController@create');
//Route::get('articles/{id}', 'ArticlesController@show');
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/{id}/edit', 'ArticlesController@edit');

Route::resource('articles', 'ArticlesController'); // this generates all of the above commented routes. run "php artisan route:list"

Route::get('tags/{tags}', 'TagsController@show'); // to make tags clickable and navigate to that tag related article

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('foo', ['middleware' => 'manager', function(){
    return 'This page will only be visible to a Manager';
}]);