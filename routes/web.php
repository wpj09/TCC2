<?php

use App\Http\Controllers\Admin\AuthController;
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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function (){

    /** Formulário de Login*/
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.do');

    /** Rotas Protegidas*/
    Route::group(['middleware' => ['auth']], function (){

        /** Dashboar Home*/
        Route::get('home', [AuthController::class, 'home'])->name('home');
    });

    /** Logout*/
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
