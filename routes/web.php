<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return 'Main home page';
});

Route::group( [ 'prefix' => 'v1/' ], function () {

    //tafasir
    Route::get('tafasir', [
        'as' => 'api_tafasir',
        'uses' => 'ApiController@getTafasir'
    ]);

//  {key1}/{surah_number}/{aya_number}
    Route::get('tafsir/{key}/{sura_number}/{aya_number}', [
        'as' => 'api_tafsir',
        'uses' => 'ApiController@getTafsir'
    ]);

//  {page_tafsir}/{key1,key2}/{sura_number}
    Route::get('page_tafsir/{keys}/{sura_number}', [
        'as' => 'api_page_tafsir',
        'uses' => 'ApiController@getPageTafsir'
    ]);

//  /{page_number}
    Route::get('ayat/{page_number}', [
        'as' => 'api_aya',
        'uses' => 'ApiController@getAyat'
    ]);

//  /{page_number}
    Route::get('ayat2/{page_number}', [
        'as' => 'api_ayat2',
        'uses' => 'ApiController@getAyat2'
    ]);

});