<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;

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
    return view('pages.dashboard');
})->name('dashboard');
Route::prefix('server')->group(function () {
    Route::get('/parameters', [ServerController::class, 'parameters'])->name('server.parameters');
    Route::get('/reboot', [ServerController::class, 'reboot'])->name('server.reboot');
    Route::post('/reboot', [ServerController::class, 'rebootConfirm'])->name('server.reboot.confirm');
    Route::get('/reinstall', [ServerController::class, 'reinstall'])->name('server.reinstall');
    Route::post('/reinstall', [ServerController::class, 'reinstallConfirm'])->name('server.reinstall.confirm');
    Route::get('/password-change', [ServerController::class, 'passwordChange'])->name('server.password-change');
    Route::post('/password-change', [ServerController::class, 'passwordChangeConfirm'])->name('server.password-change.confirm');
    Route::get('/hostname-change', [ServerController::class, 'hostnameChange'])->name('server.hostname-change');
    Route::post('/hostname-change', [ServerController::class, 'hostnameChangeConfirm'])->name('server.hostname-change.confirm');
    Route::get('/web-console', [ServerController::class, 'webConsole'])->name('server.web-console');
    Route::post('/web-console', [ServerController::class, 'webConsoleConfirm'])->name('server.web-console.confirm');
});
