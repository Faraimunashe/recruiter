<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/users/vacancies', 'App\Http\Controllers\users\DashboardController@index')->name('user-dashboard');
    Route::get('/users/vacancy/{id}', 'App\Http\Controllers\users\DashboardController@apply')->name('user-apply');

    Route::get('/users/portifolio', 'App\Http\Controllers\users\PortifolioController@index')->name('user-portifolio');
    Route::get('/users/add/portifolio', 'App\Http\Controllers\users\PortifolioController@add')->name('add-portifolio');
    Route::post('/portifolio', 'App\Http\Controllers\users\PortifolioController@post')->name('user-add-portifolio');
    Route::post('/cv', 'App\Http\Controllers\users\PortifolioController@uploadCV')->name('user-cv');
});


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('admin-dashboard');

    Route::get('/admin/vacancies', 'App\Http\Controllers\admin\VacancyController@index')->name('admin-vacancies');
    Route::get('/admin/vacancy', 'App\Http\Controllers\admin\VacancyController@add')->name('admin-add-vacancy');
    Route::post('/admin/vacancy/post', 'App\Http\Controllers\admin\VacancyController@post')->name('admin-v-add');
    Route::get('/admin/delete/vacancy/{id}', 'App\Http\Controllers\admin\VacancyController@delete')->name('admin-delete-vacancy');

    Route::get('/admin/applications', 'App\Http\Controllers\admin\ApplicationsController@index')->name('admin-applications');
    Route::get('/admin/invite/{id}', 'App\Http\Controllers\admin\ApplicationsController@invite')->name('admin-application-invite');
});


require __DIR__.'/auth.php';
