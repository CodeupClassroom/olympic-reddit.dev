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


// PageController
// Router
/*switch ($path) {
    case '/': // in Laravel it looks like Route::get('/', function () {
        // our controller logic
        return  view('welcome');
        break;
    case '/ads/new': // Route::get('/ads/new', function () {
        break;
    case '/ads/edit': // Route::get('/ads/edit', function () {
        break;
}*/

Route::get('/from/{start}/to/{end}', 'HomeController@showNumbers');

Route::get('/uppercase/{word}' /* this i the path */, /* controller function*/ function ($word) {
    $data = [
        'word' => $word,
        'uppercased' => strtoupper($word),
    ];
    return view('uppercase', $data);
});

Route::get('/', 'HomeController@showWelcomePage');

Route::get('/rolldice/{guess}', function($guess) {
    $random = mt_rand(1, 6);

    if($guess == $random) {
        $message = "You guessed it!";
    } else if($guess > $random) {
        $message = "You guessed too high!";
    } else {
        $message = "You guessed too low, yo!";
    }

    if(!is_numeric($guess) || ($guess > 6 || $guess < 1)) {
        $message = "Your guess must be a number between 1 and 6";
    }

    
    $data = [
        'guess' => $guess,
        'random' => $random,
        'message' => $message
    ];


    return view('roll-dice', $data);


});

Route::get('/sayhello/{name?}', 'HomeController@sayHello');


Route::get('/increment/{number?}', function($number = 0) {
    $data = [];
    if(is_numeric($number)) {
        $data['number'] = $number + 1;
    } else {
        $data['number'] = $number . " is not a number and cannot be incremented.";
    }

    return view('increment', $data);
});

Route::get('/add/{num1}/{num2}', function($num1, $num2) {
    if(is_numeric($num1) && is_numeric($num2)) {
        return $num1 + $num2;
    } else {
        return "Both parameters must be numeric.";
    }
});

