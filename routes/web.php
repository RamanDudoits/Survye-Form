<?php

use App\Http\Controllers\SurveyController;
use App\Livewire\FormSurvey;
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

Route::get('/', FormSurvey::class)->name('main');

Route::get('/success', function(){
    return view('success');
})->name('success');

Route::post('/', [SurveyController::class, 'index'])->name('saveform');
