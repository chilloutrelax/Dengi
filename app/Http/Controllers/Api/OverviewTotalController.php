<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Overview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OverviewTotalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        // $data = request([
        $income = Overview::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)->whereNull('delete_date')->where('type', 'Sissetulek')->sum('money');
        $expense = Overview::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)->whereNull('delete_date')->sum('money');
        
        
        //return $data ? response()->json([]) : response()->json([], 404);
        return $income & $expense ? response()->json([
            'incomes' => $income,
            'expenses' => $expense
        ]) : response()->json([], 404);
        // return $expense ? response()->json($expense) : response()->json([], 404);
    }
}
