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

Route::get('/', function () {
    return view('registration');
});

Route::get('candy','candyCtrl@candyview');
Route::get('registration','candyCtrl@registration');
Route::get('login','candyCtrl@login');
Route::get('dashboard','candyCtrl@dashboard');

Route::post('value-insert','candyCtrl@valueInsert');
Route::post('value-delete','candyCtrl@valueDelete');
Route::get('value-select','candyCtrl@valueSelect');
Route::post('value-update','candyCtrl@valueUpdate');
Route::post('user-login','candyCtrl@userLogin');
Route::get('user-dashboard','candyCtrl@userDashboard');
Route::get('log-out','candyCtrl@logOut');
Route::post('photo-upload','candyCtrl@photoUpload');