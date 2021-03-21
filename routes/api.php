<?php

use App\Models\Overview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OverviewController;
use App\Http\Controllers\Api\OverviewTotalController;
use App\Http\Controllers\Api\OverviewBiggestMoneyController;
use App\Http\Controllers\Api\OverviewCurrentController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('overviews', OverviewController::class)->only(['index', 'show']);
Route::post('overviews', [OverviewController::class, 'addOverview']);
Route::put('overviews/{id}', [OverviewController::class, 'editOverview']);
Route::delete('overviews/{id}', [OverviewController::class, 'deleteOverview']);


//Sissetulekute route (Vaheta hiljem number 1 {user_id} vastu).
Route::get('overviews/1/totals/', OverviewTotalController::class)->name('overview.totals.show');
//Sissetulekute suurim ja väikseim summa (pane hiljem user_id)
Route::get('overviews/1/biggest/', OverviewBiggestMoneyController::class)->name('overview.biggest.show');
//Overviews hetkelise kuu kohta
Route::get('overviews/1/current', OverviewCurrentController::class)->name('overviews.this.month');


