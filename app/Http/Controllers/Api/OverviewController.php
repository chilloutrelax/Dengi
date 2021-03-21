<?php

namespace App\Http\Controllers\Api;


use App\Models\Overview;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\OverviewIndexResource;

class OverviewController extends Controller
{
    public function index(){
        return OverviewIndexResource::collection(Overview::all());
    }

    public function show($id){
        return new OverviewIndexResource(Overview::findOrFail($id));
    }

    public function addOverview(Request $request) {
        $this->validate($request, [
            'date_added' => 'required|date',
            'money' => 'required',
            'comment' => 'required',
            'type' => 'required',
        ]);
        
        return Overview::create([
            'date_added' => $request->date_added,
            'money' => $request->money,
            'comment' => $request->comment,
            'type' => $request->type
        ]);
    }

    public function editOverview(Request $request) {

        $this->validate($request, [
            'date_added' => 'required|date',
            'money' => 'required',
            'comment' => 'required',
            'type' => 'required|string',
        ]);

        return Overview::where('id', $request->id)->update([
            'date_added' => $request->date_added,
            'money' => $request->money,
            'comment' => $request->comment,
            'type' => $request->type
        ]);
    }

    public function deleteOverview(Request $request) {

        $currentDate = Carbon::now();

        return Overview::where('id', $request->id)->update([
            'delete_date' => $currentDate
        ]);

        // return Overview::where('id', $request->id)->delete();
    }
}
