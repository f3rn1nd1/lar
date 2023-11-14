<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
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
Route::resource('skills', App\Http\Controllers\SkillController::class)->middleware('auth');
Route::resource('experiences', App\Http\Controllers\ExperienceController::class)->middleware('auth');
Route::resource('studies', App\Http\Controllers\StudyController::class)->middleware('auth');
Route::middleware(['role:reclutador'])->group(function () {
    Route::get('joboffers/insertjson', [App\Http\Controllers\JobOffersController::class, 'insert_into_json'])->name('insertjson');
    Route::resource('joboffers', App\Http\Controllers\JobOffersController::class);
});
Route::get('/candidates', [App\Http\Controllers\CandidateController::class, 'showCandidates'])->name('candidates');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');