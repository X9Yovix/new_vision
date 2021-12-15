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



Route::group(
	[
		'namespace' => 'Auth', 'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
	],
	function () {
		Route::get('/login/{type}', 'LoginController@loginForm')->middleware('guest')->name('login.show');
		Route::post('/login', 'LoginController@login')->name('login');
		Route::post('/register', 'RegisterController@create')->name('register');
		Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
	}
);

Route::group(
	/* ['middleware' =>  'guest'], */
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'guest']
	],
	function () {
		/* Route::get('/', function () {
		return view('auth.login');
	}); */
		Route::get('/selection', 'HomeController@index')->name('selection');
		Route::get('/', function () {
			return view('auth.selection');
		})->name('home_page');
		Route::get('/home', function () {
			return view('auth.selection');
		});
		Route::get('/register', function () {
			return view('auth.register');
		});
	}
);


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
		/*
		Route::group(['namespace' => "Auth"], function () {
			Route::get('/logout', 'LoginController@logout');
		});
		*/
		Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
		//Route::resource('Grades', 'GradeController');

		Route::group(['namespace' => "Grade"], function () {
			Route::resource('Grade', 'GradeController');
		});

		Route::group(['namespace' => 'Classrooms'], function () {
			Route::resource('Classrooms', 'ClassroomsController');
			Route::post('delete_all', 'ClassroomsController@delete_all')->name('delete_all');

			Route::post('Filter_Classes', 'ClassroomsController@Filter_Classes')->name('Filter_Classes');
		});

		Route::group(['namespace' => 'Sections'], function () {

			Route::resource('Sections', 'SectionsController');

			Route::get('/classes/{id}', 'SectionsController@getclasses');
		});

		Route::group(['namespace' => 'Teachers'], function () {
			Route::resource('Teachers', 'TeachersController');
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
//Auth::routes();
