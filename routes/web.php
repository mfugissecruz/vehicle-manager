<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\MileageRecordController;
use App\Http\Controllers\FuelSupplyRecordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MaintenanceRecordController;
use App\Http\Controllers\MechanicController;;

Route::permanentRedirect('/', '/login');
Route::permanentRedirect('/dashboard', '/dashboard/vehicles');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('vehicles', VehicleController::class)->except('show');
        Route::resource('drivers', DriverController::class)->except('show');
        Route::resource('mechanics', MechanicController::class)->except('show');
        Route::resource('maintenance-records', MaintenanceRecordController::class)->except(['show', 'destroy']);
        Route::resource('mileage-records', MileageRecordController::class)->except(['show', 'destroy']);
        Route::resource('fuel-supply-records', FuelSupplyRecordController::class)->except(['show', 'destroy']);
    });
});
