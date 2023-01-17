<?php
// Custom routes for Bill Record processing

Route::middleware(['auth'])->group(function () {

    // Bill Page Route
    Route::get('/landing', [
        'uses' => '\App\Http\Controllers\BillController@index',
        'as' => 'landing'
    ]);

    Route::post('/billrecord/add/record', [
        'uses' => '\App\Http\Controllers\BillController@addRecord',
        'as' => 'billAddRecord'
    ]);

    Route::delete('/billrecord/{id}', [
        'uses' => '\App\Http\Controllers\BillController@delete',
        'as' => 'billDeleteRecord'
    ]);

    Route::get(
        '/billrecord/{id}', [
            'uses' => '\App\Http\Controllers\BillController@getOneBillRecord',
            'as' => 'getOneBillRecord'
        ]
    );

    Route::get(
        '/updatebillrecord', [
            'uses' => '\App\Http\Controllers\BillController@bill_update',
            'as' => 'billUpdateRecord'
        ]
    );
});

?>
