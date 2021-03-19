<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Dashboard\WeatherController as DashboardWeatherController;
use App\Http\Controllers\Dashboard\AccountController as DashboardAccountController;
use App\Http\Controllers\Dashboard\ShipController as DashboardShipController;
use App\Http\Controllers\Dashboard\ShipOperationController as DashboardShipOperationController;
use App\Http\Controllers\Dashboard\ShipReportController as DashboardShipReportController;
use App\Http\Controllers\Dashboard\RouteController as DashboardRouteController;
use App\Http\Controllers\Dashboard\ReportController as DashboardReportController;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('login');
});
Route::get('/home', function () {
    if (Auth::user()->role == 'Admin') return redirect()->route('dashboard');
    if (Auth::user()->role == 'Petugas') return redirect()->route('ship-reports.index');
    if (Auth::user()->role == 'Supervisor') return redirect()->route('reports');
})->middleware('auth');

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth']
], function () {
    // 
    Route::get('/', [DashboardHomeController::class, 'index'])->name('dashboard')->middleware('role:admin');
    Route::get('/profil', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profil', [AuthController::class, 'profile_post'])->name('profile.post');

    // 
    Route::resource('/weather', DashboardWeatherController::class)->middleware('role:admin');
    Route::resource('/ships', DashboardShipController::class)->middleware('role:admin');
    Route::resource('/ship-operations', DashboardShipOperationController::class)->middleware('role:admin');
    Route::resource('/users', DashboardAccountController::class)->middleware('role:admin');
    Route::resource('/routes', DashboardRouteController::class)->middleware('role:admin');
    Route::resource('/ship-reports', DashboardShipReportController::class)->middleware('role:admin,petugas');

    // 
    Route::get('/reports', [DashboardReportController::class, 'index'])->middleware('role:admin,supervisor')->name('reports');
    Route::get('/reports/export', [DashboardReportController::class, 'export'])->middleware('role:admin,supervisor')->name('reports.export');
});

// 
Route::group([
], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login_post'])->name('login.post')->middleware('guest');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});