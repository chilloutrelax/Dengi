<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Overview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OverviewBiggestMoneyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $biggIncome = Overview::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)->where('type', 'Sissetulek')->max('money');
        $bigExpense = Overview::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)->where('type', 'Väljaminek')->max('money'); 

        return $biggIncome & $bigExpense ? response()->json([
            'bigIncome' => $biggIncome,
            'bigExpense' => $bigExpense
        ]) : response()->json([], 404);
    }
}
