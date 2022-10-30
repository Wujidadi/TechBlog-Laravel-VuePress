<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\VuePressController;

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

Route::get('{any?}', [VuePressController::class, 'index'])
    ->where('any', '^(?!api).*$')
    ->where('any', '^(?!assets\/).*$');

Route::get('assets/{asset}', [VuePressController::class, 'getAsset'])
    ->where('asset', '.*');;
