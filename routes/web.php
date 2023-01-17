<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EntityController;
use App\Http\Controllers\Admin\ProblemController;
use App\Http\Controllers\Admin\UserController;
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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    /** Formulário de Login*/
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.do');

    /** Rotas Protegidas*/
    Route::group(['middleware' => ['auth']], function () {
        /** Dashboar Home*/
        Route::get('home', [AuthController::class, 'home'])->name('home');

        /** Usuários */
        Route::get('users/team', [UserController::class, 'team'])->name('users.team');
        Route::resource('users', 'UserController');

        /** Entidades */
        Route::resource('entities', 'EntityController');

        /** Probelmas */
        Route::get('/problem', [ProblemController::class, 'index'])->name('problem.index');
        Route::get('/problem/{id}/edit', [ProblemController::class, 'edit'])->name('problem.edit');
        Route::put('/problem/{id}', [ProblemController::class, 'update'])->name('problem.update');
    });

    /** Logout*/
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
