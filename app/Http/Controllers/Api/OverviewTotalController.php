<?php

namespace App\Http\Controllers\Api;

use App\Models\Overview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewTotalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $data = request([
        $income = Overview::where('type', 'Sissetulek')->sum('money');
        $expense = Overview::where('type', 'Väljaminek')->sum('money'); 
        
        
        //return $data ? response()->json([]) : response()->json([], 404);
        return $income & $expense ? response()->json([
            'incomes' => $income,
            'expenses' => $expense
        ]) : response()->json([], 404);
        // return $expense ? response()->json($expense) : response()->json([], 404);
    }
}
