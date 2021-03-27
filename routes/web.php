<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

// Route::get('/{any?}', App\Http\Controllers\PagesController::class);
Route::get('/', function() {
    dd("Hello world");
});

Route::domain('{subdomain}.minisend.local')->group(function () {
    Route::get('/a', function ($subdomain){
        dd($subdomain);
    });
});

