<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('articleSpecies','ArticleSpeciesController@ArticleSpecies');
//Route::get('articleSpecies/{id}','ArticleSpeciesController@ArticleSpeciesByID');
//Route::post('articleSpecies','ArticleSpeciesController@ArticleSpeciesSave');
//Route::put('articleSpecies/{id}','ArticleSpeciesController@ArticleSpeciesUpdate');
//Route::delete('articleSpecies/{id}','ArticleSpeciesController@ArticleSpeciesDelete');

Route::get('file/articleSpecies_list','FileController@articleSpeciesList');
Route::post('file/articleSpecies_list','FileController@articleSpeciesSave');

//Route::get('category','CategoryController@Category');
//Route::get('category/{id}','CategoryController@CategoryByID');
//Route::post('category','CategoryController@CategorySave');
//Route::put('category/{id}','CategoryController@CategoryUpdate');
//Route::delete('category/{id}','CategoryController@CategoryDelete');
Route::apiResource('articleSpecies','ArticleSpecies');


Route::apiResource('category','Category');


Route::apiResource('species','Species');

Route::post('uploadFileSave','FileController@FileSave');
Route::post('uploadFileArticles','FileController@FileSaveArticles');
