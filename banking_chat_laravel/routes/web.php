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
    return view('chat');
});

Route::get('add-customer-view','bankingCtrl@addCustomerView');

Route::get('add-transection-view','bankingCtrl@addTransectionView');

Route::get('bot-chat-view','bankingCtrl@botChatView');

Route::get('chat-view','bankingCtrl@chatView');

Route::post('customer-details-insert','bankingCtrl@customerDetailsInsert');

Route::post('get-name-data','bankingCtrl@getNameData');

Route::post('transection-insert','bankingCtrl@transectionInsert');

Route::post('chat-reply','bankingCtrl@chatReply');

Route::post('chat-search','bankingCtrl@chatSearch');
