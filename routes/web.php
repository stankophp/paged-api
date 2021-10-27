<?php

use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/vacancies');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('vacancies.create')->middleware('auth');
Route::get('/vacancies/{id}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit')->middleware('auth');
Route::get('/vacancies/{id}', [VacancyController::class, 'show'])->name('vacancies.show');
Route::post('/vacancies/', [VacancyController::class, 'store'])->name('vacancies.store')->middleware('auth');
Route::patch('/vacancies/{id}', [VacancyController::class, 'update'])->name('vacancies.update')->middleware('auth');
Route::delete('/vacancies/{id}', [VacancyController::class, 'destroy'])->name('vacancies.destroy')->middleware('auth');
