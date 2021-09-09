<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\GeneralListController;
use App\Http\Controllers\AbilityPersonController;
use App\Http\Controllers\RegisterPersonController;
use App\Http\Controllers\RegisterOfficialController;
use App\Http\Controllers\VacancyInstitutionController;
use App\Http\Controllers\ContractInstitutionController;
use App\Http\Controllers\RegisterInstitutionController;
use App\Http\Controllers\AgreementInstitutionController;
use App\Http\Controllers\ReplacementInstitutionController;

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
Route::get('cambiar-password', [AuthController::class, "updatePassword"])->name('auth.updatePassword')->middleware('auth');
Route::view('dashboard', 'pages.dashboard')->name('page.dashboard')->middleware('auth');
Route::get('datos-persona', [RegisterPersonController::class, "person"])->name('data.person')->middleware(['auth', 'role:persona']);
Route::get('habilidades-persona', [AbilityPersonController::class, "index"])->name('abilities.person')->middleware(['auth', 'role:persona']);
Route::get('datos-empresa', [RegisterInstitutionController::class, "institution"])->name('data.institution')->middleware(['auth', 'role:empresa']);
Route::get('vacancias', [VacancyInstitutionController::class, "index"])->name('vacancy.institution')->middleware(['auth', 'role:empresa']);

Route::get('listas-generales', [GeneralListController::class, "index"])->name('general.list')->middleware(['auth', 'role:oficial']);
Route::get('convenios', [AgreementInstitutionController::class, "index"])->name('agreement.institution')->middleware(['auth', 'role:oficial']);
Route::get('contratos', [ContractInstitutionController::class, "index"])->name('contract.institution')->middleware(['auth', 'role:oficial']);
Route::get('reposiciones', [ReplacementInstitutionController::class, "index"])->name('replacement.institution')->middleware(['auth', 'role:oficial']);

Route::get('registro-oficial', [RegisterOfficialController::class, "index"])->name('form.official')->middleware(['auth', 'role:admin']);
Route::get('reporte-persona', [PersonController::class, "index"])->name('report.person')->middleware(['auth', 'role:admin']);