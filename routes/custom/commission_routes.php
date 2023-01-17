<?php
// Custom routes for Commission Record processing

Route::middleware(['auth'])->group(function () {

    // Bill Page Route
    Route::get('/commission', [
        'uses' => '\App\Http\Controllers\CommissionController@index',
        'as' => 'commission'
    ]);

    Route::post('/commission/add/record', [
        'uses' => '\App\Http\Controllers\CommissionController@addRecord',
        'as' => 'commissionAddRecord'
    ]);

    Route::delete('/commission/{id}', [
        'uses' => '\App\Http\Controllers\CommissionController@delete',
        'as' => 'billDeleteRecord'
    ]);

    Route::get('/commission/find-record/{id}', [
        'uses' => '\App\Http\Controllers\CommissionController@get_one_commissionrecord',
        'as' => 'find_one_commission_record'
    ]);

    Route::get('/commission/update-record', [
        'uses' => '\App\Http\Controllers\CommissionController@update_commissionrecord',
        'as' => 'update_one_commission_record'
    ]);

    Route::get('/commission/get-checker', [
        'uses' => '\App\Http\Controllers\CommissionController@get_checker',
        'as' => 'commission_record_get_checker'
    ]);
});

?>
