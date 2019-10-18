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

/*
Route::middleware(['Auth'])->group(function(){
	//rutas middleware auth
})
*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/email', 'HomeController@sendEmail');

Route::get('/register/student', 'Auth\RegisterController@showRegistrationStudentForm');
Route::post('/register/student', 'Auth\RegisterController@registerStudent')->name('registerStudent');

Route::get('/register/teacher', 'Auth\RegisterController@showRegistrationTeacherForm');
Route::post('/register/teacher', 'Auth\RegisterController@registerTeacher')->name('registerTeacher');


//Profile
Route::resource('perfil', 'ProfileController');
