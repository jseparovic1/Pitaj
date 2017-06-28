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

Route::get('/', 'HomeController@index')->name('home');

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


Route::group(["namespace" => 'Question'], function () {
    //show questions with given tag, it needs to bee before /pitanja/{question}
    Route::get('/pitanja/tag/{tag}/', 'QuestionTagController@show')->name('tag.show');

    Route::get('/pitaj', 'QuestionController@create')->name('question.askForm');
    Route::post('/pitaj', 'QuestionController@store')->name('question.store');
    Route::post('/pitanja/edit/{id}/', 'QuestionController@update')->name('question.edit');
    Route::delete('/pitanja/{question}/', 'QuestionController@destroy')->name('question.destroy');
    Route::get('/pitanja/{id}/{slug?}', 'QuestionController@show')->name('question.single');
});

Route::group(["namespace" => 'Answer'], function () {
    Route::post('/pitanja/{id}/', 'AnswerController@store')->name('question.answer');
    Route::get('/up/{answerId}', 'AnswerController@up')->name('answer.up');
    Route::get('/down/{answerId}', 'AnswerController@down')->name('answer.down');
});









