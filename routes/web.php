<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', [App\Http\Controllers\TypeController::class, 'index'])->name('type.index');


Route::get('/vehicle/{vehicle}', [App\Http\Controllers\VehicleController::class, 'show'])->name('vehicles.show');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/vehicle/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/vehicle', [App\Http\Controllers\VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicle/{vehicle}/edit', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::post('/vehicle/{vehicle}', [App\Http\Controllers\VehicleController::class, 'update'])->name('vehicles.update');
});

Route::get('rent', [App\Http\Controllers\RentController::class, 'index'])->name('rent.index');
Route::get('rent/{vehicle}', [App\Http\Controllers\RentController::class, 'create'])->name('rent.create');
Route::post('rent', [App\Http\Controllers\RentController::class, 'store'])->name('rent.store');

Route::get('testing', function () {
    return view('vehicles.parts.zoomgallery');
});

Route::get('/{type}', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles.index');
