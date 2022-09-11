<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Api\RegisterController;
  
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:api')->group( function () {
    
    Route::resource('agricultures', Api\AgricultureController::class);
    
    Route::get('/crops-list', ['uses' => 'Api\AgricultureController@cropsList'])->name('crops-list');

    // Route::get('/permanent-crops-list', ['uses' => 'Api\AgricultureController@permanentCropsList'])->name('permanent-crops-list');
    // Route::get('/temp-crops-list', ['uses' => 'Api\AgricultureController@permanentCropsList'])->name('temp-crops-list');

    Route::get('/all-survey-list', ['uses' => 'Api\AgricultureController@allSurveyList'])->name('all-survey-list');

    Route::get('/farmer-list', ['uses' => 'Api\AgricultureController@farmerList'])->name('farmer-list');

    Route::post('/farmer-data-insert', ['uses' => 'Api\AgricultureController@storefarmersData'])->name('store-farmers-Data');
 
    Route::post('/farmer-data-update/{id}', ['uses' => 'Api\AgricultureController@updateFarmersData'])->name('update-farmers-Data');
   


    Route::get('/survey-data', ['uses' => 'Api\AgricultureController@surveyData'])->name('survey-data');

    Route::get('/dashboard', ['uses' => 'Api\AgricultureController@dashbaord'])->name('dashboard');

    Route::post('/submit-for-forward', ['uses' => 'Api\AgricultureController@submitForForward'])->name('submit-for-forward');
    
    Route::post('/store-farmers-data', ['uses' => 'Api\AgricultureController@storefarmersData'])->name('store-farmers-data');

    Route::post('/update-farmers-data', ['uses' => 'Api\AgricultureController@updateFarmersData'])->name('update-farmers-data');

    Route::post('/store-tofsil-1-data', ['uses' => 'Api\AgricultureController@storeTofsil1Data'])->name('store-tofsil-1-data');

    Route::post('/store-tofsil-2-data', ['uses' => 'Api\AgricultureController@storeTofsil2Data'])->name('store-tofsil-2-data');

    Route::post('/store-tofsil-3-data', ['uses' => 'Api\AgricultureController@storeTofsil3Data'])->name('store-tofsil-3-data');

    Route::post('/store-tofsil-4-data', ['uses' => 'Api\AgricultureController@storeTofsil4Data'])->name('store-tofsil-4-data');

    Route::post('/store-tofsil-5-data', ['uses' => 'Api\AgricultureController@storeTofsil5Data'])->name('store-tofsil-5-data');

    Route::post('/store-tofsil-6-data', ['uses' => 'Api\AgricultureController@storeTofsil6Data'])->name('store-tofsil-6-data');

    Route::post('/store-tofsil-8-data', ['uses' => 'Api\AgricultureController@storeTofsil8Data'])->name('store-tofsil-8-data');

    Route::post('/store-tofsil-10-data', ['uses' => 'Api\AgricultureController@storeTofsil10Data'])->name('store-tofsil-10-data');

    Route::post('/store-tofsil-11-data', ['uses' => 'Api\AgricultureController@storeTofsil11Data'])->name('store-tofsil-11-data');


    // update
    Route::post('/update-tofsil-1-data/{id}',['uses'=>'Api\AgricultureController@updateTofsil1Data'])->name('update-tofsil-1-data');

    Route::post('/update-tofsil-2-data/{id}',['uses'=>'Api\AgricultureController@updateTofsil2Data'])->name('update-tofsil-2-data');

    Route::post('/update-tofsil-3-data/{id}',['uses'=>'Api\AgricultureController@updateTofsil3Data'])->name('update-tofsil-3-data');

    Route::post('/update-tofsil-4-data/{id}',['uses'=>'Api\AgricultureController@updateTofsil4Data'])->name('update-tofsil-4-data');

    Route::post('/update-tofsil-5-data/{id}',['uses'=>'Api\AgricultureController@updateTofsil5Data'])->name('update-tofsil-5-data');

    Route::post('/update-tofsil-6-data/{id}',['uses'=>'Api\AgricultureController@updateTofsil6Data'])->name('update-tofsil-6-data');

    Route::post('/update-tofsil-8-data/{id}',['uses'=>'Api\AgricultureController@updateTofsil8Data'])->name('update-tofsil-8-data');

    Route::post('/update-tofsil-10-data/{id}',['uses'=>'Api\AgricultureController@updateTofsil10Data'])->name('update-tofsil-10-data');

    Route::post('/update-tofsil-11-data/{id}',['uses'=>'Api\AgricultureController@updateTofsil11Data'])->name('update-tofsil-11-data');
    //end update
    
    // Route::get('/list-tofsil-11-data',['uses'=>'Api\AgricultureController@list11']);
    Route::get('/details-tofsil-2-data/{id}',['uses'=>'Api\AgricultureController@detailsTofsil2Data']);
    Route::get('/details-tofsil-5-data/{id}',['uses'=>'Api\AgricultureController@detailsTofsil5Data']);
    Route::get('/details-tofsil-10-data/{id}',['uses'=>'Api\AgricultureController@detailsTofsil10Data']);
});
