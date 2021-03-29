<?php

use App\Http\Controllers\Api\OverviewAllController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OverviewController;
use App\Http\Controllers\Api\OverviewTotalController;
use App\Http\Controllers\Api\OverviewCurrentController;
use App\Http\Controllers\Api\OverviewBiggestMoneyController;


// Kõikide tulemuste näitamiseks
Route::apiResource('overviews', OverviewController::class)->only(['index', 'show']);
// Sisestuste lisamine
Route::post('overviews/{id}', [OverviewController::class, 'addOverview']);
// Sisestuste muutmine
Route::put('overviews/{id}', [OverviewController::class, 'editOverview']);
// Sisestusele delete date
Route::put('overviews/{id}/delete', [OverviewController::class, 'deleteOverview']);

//User delete
Route::delete('users/delete/{id}', [UserController::class, 'destroy']);

//Sissetulekute route (Vaheta hiljem number 1 {user_id} vastu).
Route::get('overviews/totals/{id}', OverviewTotalController::class)->name('overview.totals.show');
//Sissetulekute suurim ja väikseim summa (pane hiljem user_id)
Route::get('overviews/biggest/{id}', OverviewBiggestMoneyController::class)->name('overview.biggest.show');
//Overviews hetkelise kuu kohta
Route::get('overviews/current/{id}', OverviewCurrentController::class)->name('overviews.this.month');
//Kõik overviewsid useri kaupa
Route::get('overviews/all/{id}', OverviewAllController::class)->name('overviews.all.user');


//Mitte kasutusel aga vajalikud
// Route::delete('overviews/{id}', [OverviewController::class, 'deleteOverview']);