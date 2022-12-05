<?php

use App\Http\Controllers\AdminPatientCotroller;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DocumentAdminController;
use App\Http\Controllers\DocumentUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

//  DB::listen(function($query){
//     var_dump($query->sql);
// });
App::setLocale('es');

Route::view('/','home')->name('home');

Auth::routes(['register' => false]);
//Auth::routes();

Route::resource('documentos',DocumentUserController::class)
                ->names('documents')
                ->parameters(['documentos'=>'service'])
                ;
Route::resource('administrador',DocumentAdminController::class)
                ->names('admin')
                ->parameters(['carpetas'=>'carpeta']);

Route::get('docuno/{titulo}/{documento}',[DocumentAdminController::class,'docDownload']);
Route::get('docs/{titulo}',[DocumentAdminController::class,'zipDownload']);

Route::resource('pacientes',AdminPatientCotroller::class)
                ->names('admin-patients')
                ->parameters(['pacientes'=>'paciente']);

Route::resource('usuarios',AdminUserController::class)
                ->names('admin-users')
                ->parameters(['usurarios'=>'usuario']);