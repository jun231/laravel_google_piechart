<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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

// 円グラフ表示用
Route::get('/dango/chart', 'DangoController@chart')->name('dango.chart');

//投票結果保存用
Route::put('/dango/vote', 'DangoController@vote')->name('dango.vote');
