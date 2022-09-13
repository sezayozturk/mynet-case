<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Person\AddressController;
use App\Http\Controllers\Admin\Person\GeneralInformationController;
use App\Http\Controllers\Admin\Person\PersonController;
use App\Http\Controllers\CountryCityController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

// Index
Route::get('/', [IndexController::class, 'index'])->name('index');

// Admin
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('person.')->prefix('person')->group(function () {
        Route::get('/', [PersonController::class, 'index']);
        Route::get('index', [PersonController::class, 'index'])->name('index');
        Route::match(['get', 'post'], 'data', [PersonController::class, 'data'])->name('data');
        Route::get('create', [PersonController::class, 'create'])->name('create');
        Route::match(['get', 'post'], 'store', [PersonController::class, 'store'])->name('store');
        Route::get('edit/{person}', [PersonController::class, 'edit'])->name('edit');
        Route::match(['get', 'post'], 'update/{person}', [PersonController::class, 'update'])->name('update');
        Route::post('status-change', [PersonController::class, 'statusChange'])->name('status.change');
        Route::delete('destroy', [PersonController::class, 'destroy'])->name('destroy');

        Route::prefix('{person}')->group(function () {

            // General Information
            Route::name('generalInformation.')->prefix('general-information')->group(function () {
                Route::get('index', [GeneralInformationController::class, 'index'])->name('index');
            });

            // Address
            Route::name('address.')->prefix('address-information')->group(function () {
                Route::get('index', [AddressController::class, 'index'])->name('index');
                Route::match(['get', 'post'], 'data', [AddressController::class, 'data'])->name('data');
                Route::get('create', [AddressController::class, 'create'])->name('create');
                Route::match(['get', 'post'], 'store', [AddressController::class, 'store'])->name('store');
                Route::get('edit/{address}', [AddressController::class, 'edit'])->name('edit');
                Route::match(['get', 'post'], 'update/{address}', [AddressController::class, 'update'])->name('update');
                Route::delete('destroy', [AddressController::class, 'destroy'])->name('destroy');
            });
        });
    });
});

// Other
Route::post('citiesOfCountry', [CountryCityController::class, 'citiesOfCountry'])->whereNumber('id')->name('citiesOfCountry');

