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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\Blog\PostController;

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/blog/post/{post}', [PostController::class, 'showPost'])->name('single-post');
Route::get('/blog/categories/{category}', [PostController::class, 'postsByCategories'])->name('categories-posts');
Route::get('/blog/tags/{tag}', [PostController::class, 'postsByTags'])->name('tags-posts');

Auth::routes();

Route::middleware('auth')->group(function () {
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories', 'CategoriesController');

    Route::resource('tags', 'TagsController');

    Route::resource('posts', 'PostsController');

    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts');

    Route::put('restore-posts/{post}', 'PostsController@restore')->name('restore-posts');

    Route::get('users/profile', 'UsersController@edit')->name('edit-profile');
    
    Route::put('users/profile/{user}', 'UsersController@update')->name('update-profile');

});

Route::middleware('auth', 'admin')->group(function () {

    Route::get('users', 'UsersController@index')->name('users.index');

    Route::post('users/{user}/make-admin', 'UsersController@makeUserAdmin')->name('make-admin');

    Route::put('users/{user}/remove-admin', 'UsersController@removeUserAdmin')->name('remove-admin');

    Route::delete('users/{user}/delete-user', 'UsersController@destroy')->name('delete-user');
});



