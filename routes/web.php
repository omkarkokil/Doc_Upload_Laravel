<?php

use App\Http\Controllers\BasicAuthController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['web', 'checkAuth']], function () {
    Route::get(
        '/home',
        function () {
            return view('home');
        }
    );

    Route::get('/logout', [BasicAuthController::class, 'logout']);
    Route::get('/upload', [DocController::class, 'uploadView']);
    Route::get('/showdocuments', [DocController::class, 'docView']);
    Route::post('/uploadFile', [DocController::class, 'store']);
    Route::get('/download/{file}', [DocController::class, 'download']);
    Route::get('/view/{id}', [DocController::class, 'view']);
    Route::get('/delete/{id}', [DocController::class, 'delete']);
});





Route::get('/', [BasicAuthController::class, 'loginIndex'])->name('login');
Route::post('/', [BasicAuthController::class, 'Login']);

Route::get('/register', [BasicAuthController::class, 'registerIndex'])->name("register");
Route::post('/register', [BasicAuthController::class, 'Register']);






Route::get('auth/login', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/login', [GoogleAuthController::class, 'redirect'])->name('google-auth');

Route::get("auth/google/call-back", [GoogleAuthController::class, 'callbackGoogle']);