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

Route::get('/from/{start}/to/{end}', 'HomeController@showNumbers');
Route::get('/', 'HomeController@showWelcomePage');
Route::get('/sayhello/{name?}', 'HomeController@sayHello');

Route::get('/uppercase/{word}' /* path */, /* controller@method */'ExampleController@uppercased');
Route::get('/rolldice/{guess}', 'ExampleController@rollDice');
Route::get('/increment/{number?}', 'ExampleController@increment');
Route::get('/add/{num1}/{num2}', 'ExampleController@addition');

/*// CRUD operations for posts
Route::get('/posts', 'PostsController@index'); // show all the posts
Route::get('/posts/create', 'PostsController@create'); // show the form to create a post
Route::post('/posts', 'PostsController@store'); // save the new post
Route::get('/posts/{posts}', 'PostsController@show'); // show a specific post (by id)
Route::get('/posts/{posts}/edit', 'PostsController@edit'); // show the form to edit a post
Route::put('/posts/{posts}', 'PostsController@update'); // update the post in the database
Route::delete('/posts/{posts}', 'PostsController@destroy'); // delete a post*/


Route::resource('posts', 'PostsController');  // A resource controller
Route::resource('students', 'StudentsController');  // A resource controller

// poor man's user seeder 
Route::get('/makeusers', function() {
    $user = new \App\User();
    $user->name = 'Ryan';
    $user->email = 'ryan@codeup.com';
    $user->password = 'crappypassword';
    $user->save();

    $user1 = new \App\User();
    $user1->name = 'Luis';
    $user1->email = 'luis@codeup.com';
    $user1->password = 'betterpasswordsarelonger';
    $user1->save();
});

// poor man's student seeder 
Route::get('/makestudents', function() {
    $student = new \App\Models\Student();
    $student->first_name = 'Jane Janeway';
    $student->school_name = 'Codeup';
    $student->description = 'front end specialist';
    $student->save();

    $student1 = new \App\Models\Student();
    $student1->first_name = 'Bob Bobberson';
    $student1->school_name = 'Hard Knocks University';
    $student1->description = 'Wizard of copy/paste from stack overflow';
    $student1->save();

    $student2 = new \App\Models\Student();
    $student2->first_name = 'Chet Chedderson';
    $student2->school_name = 'Le Petit Academy';
    $student2->description = 'Chet is a remarkably strong dev for his age!';
    $student2->save();
});

Route::get('/makeposts', function() {
    $post = new \App\Models\Post();
    $post->title = "Hello World";
    $post->url = str_slug($post->title, "-");
    $post->content = "Hello World, I'm doing Laravel and making full stack apps rapidly
    !";
    $post->created_by = \App\User::all()->random()->id;
    $post->save();

    $post = new \App\Models\Post();
    $post->title = "Thursday is a fine day for Laravel";
    $post->url = str_slug($post->title, "-");
    $post->content = "Seriously, Laravel is awesome. Thursdays are awesome. #Laravel-Thursday and #Laravel-Everyday";
    $post->created_by = \App\User::all()->random()->id;
    $post->save();

    $post = new \App\Models\Post();
    $post->title = "Friday I'm in Love";
    $post->url = str_slug($post->title, "-");
    $post->content = "Monday is blue and Tuesday is too...";
    $post->created_by = \App\User::all()->random()->id;
    $post->save();

});