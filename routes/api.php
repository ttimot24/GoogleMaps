<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function () {

    Route::get('/google-maps/branches', function () {
        return \Plugin\GoogleMaps\App\Model\Location::all();
    });

});
