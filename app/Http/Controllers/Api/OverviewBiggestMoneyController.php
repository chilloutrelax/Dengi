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
    public function __invoke(Request $request, $id)
    {

        $bigIncome = Overview::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)->whereNull('delete_date')->where('type', 'Sissetulek')->where('user_id', $id)->max('money');
        $bigExpense = Overview::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)->whereNull('delete_date')->where('type', 'Väljaminek')->where('user_id', $id)->max('money'); 

        return $bigIncome & $bigExpense ? response()->json([
            'bigIncome' => $bigIncome,
            'bigExpense' => $bigExpense
        ]) : response()->json([], 404);
    }
}
