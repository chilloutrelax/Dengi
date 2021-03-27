<?php

namespace App\Http\Controllers\Api;

use App\Models\Overview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OverviewAllController extends Controller
{
     /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        // $AllUserData = Overview::all()->where('user_id', $id)->whereNull('delete_date')->orderBy('id', 'DESC')->get();

        $AllUserData2 = Overview::where('user_id', "=", $id)->get();
        
        return $AllUserData2 ? response()->json([
            'data' => $AllUserData2,
        ]) : response()->json([], 404);        
    }
}
