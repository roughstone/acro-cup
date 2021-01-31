<?php

use Illuminate\Support\Facades\Route;
use App\Setting;
use App\Competition;

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

Auth::routes();

Route::get('/', function () {
    $organisation = Setting::where('key', 'organisation')->first();
    $phone = Setting::where('key', 'phone')->first();
    $email = Setting::where('key', 'email')->first();
    $competition = Competition::where('active', 'active')->first();
    return view('welcome', [
        'organisation'=> $organisation->value,
        'phone' => $phone->value,
        'email'=> $email->value,
        'competition' => $competition
        ]);
})->name('wellcome');

Route::get('/app', 'HomeController@index')->middleware(['auth']);
Route::get('/getForm/{form}', 'NominativeFormsController@index')->middleware(['auth', 'active']);
Route::get('/records/{kind}', 'NominativeFormsController@recordsData')->middleware(['auth', 'active'])->name('records');

Route::get('profile', 'ProfileController@index')->middleware('auth');
Route::post('profile', 'ProfileController@update')->middleware(['auth', 'active']);
Route::delete('profile/{id}', 'ProfileController@destroy')->middleware('auth');

Route::get('nominative', 'NominativeController@index')->middleware(['auth', 'active']);
Route::post('nominative', 'NominativeController@store')->middleware(['auth', 'active']);
Route::delete('nominative/{type}/{id}', 'NominativeController@destroy')->middleware('auth');

Route::get('definative', 'DefinativeController@index')->middleware(['auth', 'active']);
Route::post('definative', 'DefinativeController@update')->middleware(['auth', 'active']);

//Admin routes
Route::get('competition/{competition}', 'AdminController@show')->middleware(['auth', 'admin', 'active']);
Route::get('competitions', 'AdminController@index')->middleware(['auth', 'admin', 'active']);
Route::get('directive/{competition}', 'CompetitionController@directive');
Route::post('competitions', 'CompetitionController@store')->middleware(['auth', 'admin', 'active']);
Route::put('competitions/{competition}', 'CompetitionController@update')->middleware(['auth', 'admin', 'active']);
Route::get('competitions/{competition}', 'CompetitionController@show')->middleware(['auth', 'admin', 'active']);
Route::get('messages', 'AdminController@index')->middleware(['auth', 'admin', 'active']);
Route::get('settings', 'AdminController@index')->middleware(['auth', 'admin', 'active']);

Route::post('hotels', 'HotelController@store')->middleware(['auth', 'admin', 'active']);
Route::get('hotel/{hotel}/edit', 'HotelController@edit')->middleware(['auth', 'admin', 'active']);
Route::get('hotel', 'HotelController@create')->middleware(['auth', 'admin', 'active']);

Route::get('accommodation', 'AccommodationController@index')->middleware(['auth', 'active']);
Route::post('accommodation', 'AccommodationController@store')->middleware(['auth', 'active']);
Route::get('accommodation/{hotel}', 'AccommodationController@show')->middleware(['auth', 'active']);
Route::delete('accommodation/{accommodation}/delete', 'AccommodationController@destroy')->middleware(['auth', 'active']);
Route::get('export/{table}/{id}/{order}', 'ExportsController@export')->middleware(['auth', 'admin']);

Route::put('/settings', 'SettingController@update')->middleware(['auth', 'admin']);

Route::get('/app/{path?}', 'HomeController@index')->middleware(['auth']);
