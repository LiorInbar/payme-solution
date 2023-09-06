<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\SaleController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//storing new sale
Route::post('/store', [SaleController::class, 'store']);

//open a page for creating new sale
Route::get('/newSale', [SaleController::class, 'create']);

//creating sales table
Route::post('/salesCreateTable', [SaleController::class, 'salesCreateTable'] );

//show list of sales
Route::get('/list',  [SaleController::class, 'index']);

//delete sales table (disabled, uncomment to activate)
//Route::post('/saleDeleteTable', [SaleController::class, 'saleDeleteTable'] );

