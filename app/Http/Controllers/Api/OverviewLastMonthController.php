<?php

namespace App\Http\Controllers\Api;

use App\Models\Overview;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class OverviewLastMonthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        // $lastMonth = Overview::whereYear('date_added', Carbon::today()->year)
        //             ->where('date_added', '>=', Carbon::today()->startOfMonth()->subMonth())->where('user_id', $id)->whereNull('delete_date')->orderBy('id', 'DESC')
        //             ->get();

        // $lastMonth = Overview::where('created_at', '>=', Carbon::now()->startOfMonth())->where('user_id', $id)->whereNull('delete_date')->orderBy('id', 'DESC')->get();
        
        // return $lastMonth ? response()->json([
        //     'data' => $lastMonth,
        // ]) : response()->json([], 404);   
    }
}
