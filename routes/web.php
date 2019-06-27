<?php

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
    return view('welcome');
});

Auth::routes();


Route::get('/home/channel/stream/{streamid}', 'ProtocolController@destinationOptions');
Route::post('/home/stream/{streamid}','ProtocolController@storeProtocol');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/channel/{channel}/edit','ChannelController@edit');
Route:: patch('/home/channel/{channel}','ChannelController@update');

Route ::get('/home/channel/','ChannelController@addChannel');
Route::post('/home','ChannelController@store');

Route::get('/home/stream/{streamId}/edit', 'Stream1Controller@edit');
Route::post('/home/stream/{streamId}/update','Stream1Controller@update');

Route::get('/home/channel/{channel}/addStream','Stream1Controller@outputOptions');
Route::post('/home/channel/{channel}','Stream1Controller@storeStream');



