<?php

use Illuminate\Support\Facades\Route;
use Sfneal\GooglePlaces\Controllers\PlacesController;

// Declare places routes
Route::prefix('places')->name('places.')->group(function () {
    Route::get('city', [PlacesController::class, 'city'])->name('city');
    Route::get('zip', [PlacesController::class, 'zip'])->name('zip');
});
