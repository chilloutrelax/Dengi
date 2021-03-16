<?php

namespace App\Http\Controllers\Api;

use App\Models\Overview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $biggIncome = Overview::where('type', 'Sissetulek')->max('money');
        $bigExpense = Overview::where('type', 'Väljaminek')->max('money'); 

        return $biggIncome & $bigExpense ? response()->json([
            'bigIncome' => $biggIncome,
            'bigExpense' => $bigExpense
        ]) : response()->json([], 404);
    }
}
