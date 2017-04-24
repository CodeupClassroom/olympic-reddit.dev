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

Route::get('/sayhello/{name?}', function($name = "World") {
    return "Hello, $name!";
});

Route::get('/uppercase/{word}', function($word) {
	return strtoupper($word);
});

Route::get('/increment/{number?}', function($number = 0) {
	if(is_numeric($number)) {
		return $number + 1;
	} else {
		return $number . " is not a number and cannot be incremented.";
	}
});

Route::get('/add/{num1}/{num2}', function($num1, $num2) {
	if(is_numeric($num1) && is_numeric($num2)) {
		return $num1 + $num2;
	} else {
		return "Both parameters must be numeric.";
	}
});
