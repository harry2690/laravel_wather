<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test',function(){
    $service = app()->make(App\Service\Weather\WeatherService::class);
    var_dump($service->getWeekWeatherByCity(\App\Support\Enums\City::NEW_TAIPEI));
});
