<?php

namespace App\Http\Controllers\Api;


use Carbon\Carbon;
use App\Models\Overview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OverviewCurrentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $thisMonth = Overview::whereYear('date_added', Carbon::today()->year)
                    ->whereMonth('date_added', Carbon::today()->month)->whereNull('delete_date')
                    ->get();
        
        return $thisMonth ? response()->json([
            'data' => $thisMonth,
        ]) : response()->json([], 404);        
    }
}
