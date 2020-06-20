
<?php
use App\Location;
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
    $districts=Location::pluck('district','district');

    return view('front',compact('districts'));
});

Route::post('searchCity','SearchGirlsController@searchCity');

