<?php

use App\Http\Controllers\Api\OverviewController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Index - kõikidele vastetele, show - kindel vaste
// Route::get('overviews', [OverviewController::class, 'index']);
// Route::get('overviews/{id}', [OverviewController::class, 'show']);

//Sama, mis eelmine aga refactored (eemalda ->only.. et saada ligi kõikidele meetoditele)
Route::apiResource('overviews', OverviewController::class)->only(['index', 'show']);