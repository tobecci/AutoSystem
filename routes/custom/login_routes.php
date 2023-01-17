<?php
 
// Custom login routes
    
    Route::get('/login', [
        'uses' => '\App\Http\Controllers\LoginController@login',
        'as' => 'login'
    ]);

    Route::post('/authenticate', [
        'uses' => '\App\Http\Controllers\LoginController@authenticate',
        'as' => 'authenticate'
    ]);

    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', [
            'uses' => '\App\Http\Controllers\LoginController@logout',
            'as' => 'logout'
        ]);
    })

?>
