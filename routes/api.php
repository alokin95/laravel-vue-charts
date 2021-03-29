<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt.auth')->group(function()
{
    Route::get('/contracts/{contractId}', [ReportsController::class, 'contractSearch']);
    Route::get('/reports/{macAddress}/{range}', [ReportsController::class, 'getReports']);
});

