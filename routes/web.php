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
});

Route::get('/ask', 'QuestionController@showForm')->name('question.askForm');
Route::post('/ask', 'QuestionController@showForm')->name('question.store');





