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

Route::get('/', 'NotificationsController@getIndex')->name('index');
Route::get('notifications/list', 'NotificationsController@getList')->name('notifications_list');
Route::get('notifications/create', 'NotificationsController@getCreate')->name('notifications_create');
Route::post('notifications/create', 'NotificationsController@create')->name('notifications_create');
Route::get('notifications/edit/{notification_id}', 'NotificationsController@getEdit')->name('notifications_edit');
Route::post('notifications/edit', 'NotificationsController@update')->name('notifications_update');
Route::get('notifications/trash/{notification_id}', 'NotificationsController@getTrash')->name('notifications_trash');
Route::post('notifications/delete', 'NotificationsController@delete')->name('notifications_delete');