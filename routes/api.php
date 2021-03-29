<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportsController;
use Barryvdh\DomPDF\PDF;
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

Route::get('/download-report/{macAddress}', [ReportsController::class, 'downloadReportPdf']);

Route::middleware('jwt.auth')->group(function()
{
    Route::get('/contracts/{contractId}', [ReportsController::class, 'contractSearch']);
    Route::get('/reports/{macAddress}/{range}', [ReportsController::class, 'getReports']);
    Route::get('/reports/{macAddress}/{startDate}/{endDate}', [ReportsController::class, 'getReportsWithDateRange']);
});

