<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\dapur\DashboardController;
use App\Http\Controllers\dapur\BbmjenisController;
use App\Http\Controllers\dapur\BbmController;
use App\Http\Controllers\dapur\KetenagalistrikanjenisController;
use App\Http\Controllers\dapur\KetenagalistrikanController;
use App\Http\Controllers\dapur\EbtjenisController;
use App\Http\Controllers\dapur\EbtController;
use App\Http\Controllers\dapur\BatubaraController;
use App\Http\Controllers\dapur\GasbumijenisController;
use App\Http\Controllers\dapur\GasbumisektorController;
use App\Http\Controllers\dapur\GasbumiController;

use App\Http\Controllers\dapur\PenggunalevelController;
use App\Http\Controllers\dapur\PenggunaController;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/loginprocess', [LoginController::class, 'authenticate']);
// Route::get('/', [HomeController::class, 'index']);
// Route::get('/manage', [LoginController::class, 'index'])->name('manage');
// Route::post('/loginprocess', [LoginController::class, 'authenticate']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', function(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    
        return redirect('/');
    })->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/bbmjenis', [BbmjenisController::class, 'index']);
    Route::get('/bbmjenis/getlist', [BbmjenisController::class, 'getlist']);
    Route::get('/bbmjenis/add', [BbmjenisController::class, 'add']);
    Route::post('/bbmjenis/save', [BbmjenisController::class, 'save']);
    Route::get('/bbmjenis/edit', [BbmjenisController::class, 'edit']);
    Route::post('/bbmjenis/saveupdate', [BbmjenisController::class, 'saveupdate']);
    Route::post('/bbmjenis/delete', [BbmjenisController::class, 'delete']);

    Route::get('/bbm', [BbmController::class, 'index']);
    Route::get('/bbm/getlist', [BbmController::class, 'getlist']);
    Route::get('/bbm/add', [BbmController::class, 'add']);
    Route::post('/bbm/save', [BbmController::class, 'save']);
    Route::get('/bbm/edit', [BbmController::class, 'edit']);
    Route::post('/bbm/saveupdate', [BbmController::class, 'saveupdate']);
    Route::post('/bbm/delete', [BbmController::class, 'delete']);

    Route::get('/listrikjenis', [KetenagalistrikanjenisController::class, 'index']);
    Route::get('/listrikjenis/getlist', [KetenagalistrikanjenisController::class, 'getlist']);
    Route::get('/listrikjenis/add', [KetenagalistrikanjenisController::class, 'add']);
    Route::post('/listrikjenis/save', [KetenagalistrikanjenisController::class, 'save']);
    Route::get('/listrikjenis/edit', [KetenagalistrikanjenisController::class, 'edit']);
    Route::post('/listrikjenis/saveupdate', [KetenagalistrikanjenisController::class, 'saveupdate']);
    Route::post('/listrikjenis/delete', [KetenagalistrikanjenisController::class, 'delete']);

    Route::get('/listrik', [KetenagalistrikanController::class, 'index']);
    Route::get('/listrik/getlist', [KetenagalistrikanController::class, 'getlist']);
    Route::get('/listrik/add', [KetenagalistrikanController::class, 'add']);
    Route::post('/listrik/save', [KetenagalistrikanController::class, 'save']);
    Route::get('/listrik/edit', [KetenagalistrikanController::class, 'edit']);
    Route::post('/listrik/saveupdate', [KetenagalistrikanController::class, 'saveupdate']);
    Route::post('/listrik/delete', [KetenagalistrikanController::class, 'delete']);

    Route::get('/ebtjenis', [EbtjenisController::class, 'index']);
    Route::get('/ebtjenis/getlist', [EbtjenisController::class, 'getlist']);
    Route::get('/ebtjenis/add', [EbtjenisController::class, 'add']);
    Route::post('/ebtjenis/save', [EbtjenisController::class, 'save']);
    Route::get('/ebtjenis/edit', [EbtjenisController::class, 'edit']);
    Route::post('/ebtjenis/saveupdate', [EbtjenisController::class, 'saveupdate']);
    Route::post('/ebtjenis/delete', [EbtjenisController::class, 'delete']);

    Route::get('/ebt', [EbtController::class, 'index']);
    Route::get('/ebt/getlist', [EbtController::class, 'getlist']);
    Route::get('/ebt/add', [EbtController::class, 'add']);
    Route::post('/ebt/save', [EbtController::class, 'save']);
    Route::get('/ebt/edit', [EbtController::class, 'edit']);
    Route::post('/ebt/saveupdate', [EbtController::class, 'saveupdate']);
    Route::post('/ebt/delete', [EbtController::class, 'delete']);

    Route::get('/batubara', [BatubaraController::class, 'index']);
    Route::get('/batubara/getlist', [BatubaraController::class, 'getlist']);
    Route::get('/batubara/add', [BatubaraController::class, 'add']);
    Route::post('/batubara/save', [BatubaraController::class, 'save']);
    Route::get('/batubara/edit', [BatubaraController::class, 'edit']);
    Route::post('/batubara/saveupdate', [BatubaraController::class, 'saveupdate']);
    Route::post('/batubara/delete', [BatubaraController::class, 'delete']);

    Route::get('/gasbumijenis', [GasbumijenisController::class, 'index']);
    Route::get('/gasbumijenis/getlist', [GasbumijenisController::class, 'getlist']);
    Route::get('/gasbumijenis/add', [GasbumijenisController::class, 'add']);
    Route::post('/gasbumijenis/save', [GasbumijenisController::class, 'save']);
    Route::get('/gasbumijenis/edit', [GasbumijenisController::class, 'edit']);
    Route::post('/gasbumijenis/saveupdate', [GasbumijenisController::class, 'saveupdate']);
    Route::post('/gasbumijenis/delete', [GasbumijenisController::class, 'delete']);

    Route::get('/gasbumisektor', [GasbumisektorController::class, 'index']);
    Route::get('/gasbumisektor/getlist', [GasbumisektorController::class, 'getlist']);
    Route::get('/gasbumisektor/add', [GasbumisektorController::class, 'add']);
    Route::post('/gasbumisektor/save', [GasbumisektorController::class, 'save']);
    Route::get('/gasbumisektor/edit', [GasbumisektorController::class, 'edit']);
    Route::post('/gasbumisektor/saveupdate', [GasbumisektorController::class, 'saveupdate']);
    Route::post('/gasbumisektor/delete', [GasbumisektorController::class, 'delete']);

    Route::get('/gasbumi', [GasbumiController::class, 'index']);
    Route::get('/gasbumi/getlist', [GasbumiController::class, 'getlist']);
    Route::get('/gasbumi/add', [GasbumiController::class, 'add']);
    Route::post('/gasbumi/save', [GasbumiController::class, 'save']);
    Route::get('/gasbumi/edit', [GasbumiController::class, 'edit']);
    Route::post('/gasbumi/saveupdate', [GasbumiController::class, 'saveupdate']);
    Route::post('/gasbumi/delete', [GasbumiController::class, 'delete']);






    Route::get('/dap/levelpengguna', [PenggunalevelController::class, 'index']);
    Route::get('/dap/levelpengguna/getlist', [PenggunalevelController::class, 'getlist']);
    Route::get('/dap/levelpengguna/add', [PenggunalevelController::class, 'add']);
    Route::post('/dap/levelpengguna/save', [PenggunalevelController::class, 'save']);
    Route::get('/dap/levelpengguna/edit', [PenggunalevelController::class, 'edit']);
    Route::post('/dap/levelpengguna/saveupdate', [PenggunalevelController::class, 'saveupdate']);
    Route::post('/dap/levelpengguna/delete', [PenggunalevelController::class, 'delete']);

    Route::get('/dap/pengguna', [PenggunaController::class, 'index']);
    Route::get('/dap/pengguna/getlist', [PenggunaController::class, 'getlist']);
    Route::get('/dap/pengguna/add', [PenggunaController::class, 'add']);
    Route::post('/dap/pengguna/save', [PenggunaController::class, 'save']);
    Route::get('/dap/pengguna/edit', [PenggunaController::class, 'edit']);
    Route::post('/dap/pengguna/saveupdate', [PenggunaController::class, 'saveupdate']);
    Route::post('/dap/pengguna/delete', [PenggunaController::class, 'delete']);
    Route::get('/dap/pengguna/gantipassword', [PenggunaController::class, 'gantipassword']);
    Route::post('/dap/pengguna/passwordupdate', [PenggunaController::class, 'passwordupdate']);
});