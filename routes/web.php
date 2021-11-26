<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/selection', 'HomeController@selection')->name('selection');

Route::group(['namespace' => 'Auth'], function () {
	Route::get('/login/{type}', 'LoginController@loginForm')->middleware('guest')->name('login.show');
	Route::post('/login', 'HomeController@selection')->name('login');
	Route::get('/register', 'HomeController@register')->name('register');
});

Route::group(['middleware' => 'guest'], function () {
	/* Route::get('/', function () {
		return view('auth.login');
	}); */
	Route::get('/', function () {
		return view('auth.selection');
	})->name('home_page');;
	Route::get('/home', function () {
		return view('auth.selection');
	});
});


Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
	],
	function () {
		/*Route::get('/', function () {
			return view('dashboard');
		});
		*/
		Route::get('/dashboard', 'HomeController@index')->name('dashboard');
		//Route::resource('Grades', 'GradeController');

		Route::group(['namespace' => "Grade"], function () {
			Route::resource('Grade', 'GradeController');
		});

		Route::group(['namespace' => "Auth"], function () {
			Route::get('/logout', 'LoginController@logout');
		});
	}
);
/*
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
	Route::get('/', function () {
		return view('dashboard');
	});
});
*/

//Auth::routes();
