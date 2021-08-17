<?php

use App\Http\Controllers\AgreementInstitutionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralListController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RegisterPersonController;
use App\Http\Controllers\RegisterInstitutionController;
use App\Http\Controllers\VacancyInstitutionController;

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
})->name('welcome');

Route::post('login', [AuthController::class, "login"])->name('auth.login');
Route::get('formulario-persona', [RegisterPersonController::class, "register"])->name('form.person');
Route::post('registro-persona', [RegisterPersonController::class, "store"])->name('register.person');
Route::get('formulario-empresa', [RegisterInstitutionController::class, "register"])->name('form.institution');
Route::post('registro-empresa', [RegisterInstitutionController::class, "store"])->name('register.institution');

Route::post('logout', [AuthController::class, "logout"])->name('auth.logout')->middleware('auth');
Route::view('dashboard', 'pages.dashboard')->name('page.dashboard')->middleware('auth');
Route::get('datos-persona', [RegisterPersonController::class, "person"])->name('data.person')->middleware('auth');
Route::get('datos-empresa', [RegisterInstitutionController::class, "institution"])->name('data.institution')->middleware('auth');
Route::get('vacancias', [VacancyInstitutionController::class, "index"])->name('vacancy.institution')->middleware('auth');

Route::get('listas-generales', [GeneralListController::class, "index"])->name('general.list');
Route::get('convenios', [AgreementInstitutionController::class, "index"])->name('agreement.institution');
Route::get('convenios-descarga/{path}', [AgreementInstitutionController::class, "downloadAgreement"])->name('agreement.download');