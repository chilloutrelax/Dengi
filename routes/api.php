<?php

use App\Http\Controllers\Api\OverviewBiggestMoneyController;
use App\Models\Overview;
use App\Http\Controllers\Api\OverviewController;
use App\Http\Controllers\Api\OverviewTotalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
// Route::get('overviews/income', [OverviewController::class, 'index']);
// Route::get('overviews/{id}', [OverviewController::class, 'show']);

//Sama, mis eelmine aga refactored (eemalda ->only.. et saada ligi kõikidele meetoditele)
Route::apiResource('overviews', OverviewController::class)->only(['index', 'show']);


//Sisestamine Overview tabelisse, tuleb refactorida controllerisse ja resource teha.
Route::post('overviews', function (Request $request){
    return Overview::create([
        'created_at' => $request->created_at,
        'money' => $request->money,
        'comment' => $request->comment,
        'type' => $request->type
    ]);
});

//Kustutamine Overview tabelist, tuleb refactorida controllerisse ja resource teha.
Route::delete('overviews/{id}', function($id){
    DB::table('overviews')->where('id', $id)->delete();
  
    return 204;
});

//Sissetulekute route (Vaheta hiljem number 1 {user_id} vastu).
Route::get('overviews/1/totals/', OverviewTotalController::class)->name('overview.totals.show');
//Sissetulekute suurim ja väikseim summa (pane hiljem user_id)
Route::get('overviews/1/biggest/', OverviewBiggestMoneyController::class)->name('overview.biggest.show');

