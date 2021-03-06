<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Route::group(['middleware' => 'auth', 'prefix' => 'ship', 'as' => 'ship'], function () {
    Route::get('/{idShip}/spot/create', 'SpotController@initCreate')->name('.init.create');
    Route::post('/spot/search/amount', 'SpotController@searchAmount')->name('.search.amount');
    Route::post('/spot/create', 'SpotController@create')->name('.spot.create');
    Route::get('/{shipId}/spot/{id}/edit', 'SpotController@showEdit')->name('.spot.edit');
    Route::post('/{shipId}/spot/{id}/edit', 'SpotController@edit')->name('.spot.update');
});
