<?php
use App\Http\Controllers\EscuelaController;
use App\Http\Controllers\AlumnoController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('escuelas', EscuelaController::class);

Route::resource('alumnos', AlumnoController::class);

Route::get('/listado-escuelas', [App\Http\Controllers\EscuelaController::class, 'listadoEscuelas']);
