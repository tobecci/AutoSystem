<?php

use Illuminate\Support\Facades\Route;

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

include_once('custom/login_routes.php');
include_once('custom/bill_routes.php');
include_once('custom/commission_routes.php');


Route::get('/', function () {
    return redirect()->route('login');
});