<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;
use App\Http\Controllers\Display;
use App\Http\Controllers\EditDelete;
use App\Http\Middleware\checkLogin;

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

//System admin login
Route::get('/', function () {
    return view('login');
});
Route::post('/',[Main::class,'login']);

Route::middleware([checkLogin ::class])->group(function(){
    Route::get('getstatus',function(){
        return " Success";
    });
//Dashboard
Route::get('/dashboard',[Display::class,'pie']);


//Add asset type
Route::view('/addtype','addAssetType');
Route::post('/addtype',[Main::class,'addAssetType']);

//Add Assets
Route::get('/addAsset',[Main::class,'dropdown']);   //adding drop down with asset_types while adding an asset
Route::post('/addAsset',[Main::class,'addAsset']);

//Display Asset Types
Route::get('/dispAssetType',[Display::class,'dispAssetType']);

//Display Asset
Route::get('/dispAsset/{id}',[Display::class,'dispAsset']);


// Display Asset Images
Route::get('/dispImg/{id}',[Display::class,'dispImg']);

// Delete Assets
Route::delete('delAsset',[EditDelete::class,'delAsset']);

// Edit Assets
Route::get('editAsset/{id}',[EditDelete::class,'editAsset']);


// Update Asset
Route::post('/updateAsset',[EditDelete::class,'updateAsset']);


//Logout
Route::get('logout',[Main::class,'logout']);
});
