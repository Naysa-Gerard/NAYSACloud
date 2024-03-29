<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VATController;
use App\Http\Controllers\ChartOfAccountsController;
use App\Support\MyFacade;

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

Route::get("/",[ChartOfAccountsController::class,"index"]);
Route::get("coa",[ChartOfAccountsController::class,"getRecord"]);


