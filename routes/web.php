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

/**
 * Home page
 */
Route::get('/', 'HomeController@index')->name('home');

/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/register', 'RegisterController@showForm')->name('register.showForm');
    Route::post('/register', 'RegisterController@register')->name('register.create');
    Route::post('/register/success', 'RegisterController@finished')->name('register.success');

    //activation
    Route::get('/confirm/', 'ActivationController@activate')->name('register.activate');

    //login
    Route::get('/login', 'LoginController@showLoginForm')->name('session.loginForm');
    Route::post('/login', 'LoginController@login')->name('session.logIn');
    Route::get('/logout', 'LoginController@logout')->name('session.logOut');

    //oAuth login login
    Route::get('login/{provider}', 'LoginController@redirectToProvider')->name('login_fb');
    Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback')->name('login_fb_cb');
});

/**
 * Question stuff
 */
//show questions with given tag
Route::get('/pitanja/tag/{tag}', 'TagController@show')->name('tag.show');

Route::get('/pitaj', 'QuestionController@showForm')->name('question.askForm');
Route::post('/pitaj', 'QuestionController@store')->name('question.store');
Route::get('/pitanja/{id}/{slug?}', 'QuestionController@show')->name('question.single');

Route::post('/pitanja/{id}/', 'AnswerController@store')->name('question.answer');
Route::get('/up/{answerId}', 'AnswerController@up')->name('answer.up');
Route::get('/down/{answerId}', 'AnswerController@down')->name('answer.down');







