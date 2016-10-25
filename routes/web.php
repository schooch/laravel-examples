<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/config', function () {
    // dd(Config::get('database.defualt'));
    // dd(app('Illuminate\Config\Repository')['database']['default']);
    // dd(app('Illuminate\Contracts\Config\Repository')['database']['default']);
    // dd(app('config')['database']['default']);
    // dd(app()['config']['database']['default']);
});

Route::get('/hash', function () {
    // dd(Hash::make('password'));
    // dd(bcrypt('password'));
    // dd(app('hash')->make('password'));
    // dd(app('Illuminate\Hashing\BcryptHasher')->make('password'));
    // dd(app('Illuminate\Contracts\Hashing\Hasher')->make('password'));
});

Route::get('login', function(){
    $user = App\User::create([
        'name' => 'Ian Lainchbury',
        'email' => 'ianlainchbury@gmail.com',
        'password' => bcrypt('password'), 
        'plan' => 'monthly'
    ]);

    Auth::login($user);

    return redirect('/');
});

Route::get('loggedin', ['middleware' => 'subscribed:yearly'], function(){
    return 'Subscribed only page';
}]);

Route::get('test', 'WelcomeController@test');

Route::get('/ban-user', function(){
    $user = new App\User;

    event(new UserWasBanned($user));

    return view('welcome');
});
