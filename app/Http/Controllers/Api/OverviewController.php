<?php

namespace App\Http\Controllers\Api;

use App\Models\Overview;
use App\Http\Controllers\Controller;
use App\Http\Resources\OverviewIndexResource;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index(){
        return OverviewIndexResource::collection(Overview::all());
    }

    public function show($id){
        return new OverviewIndexResource(Overview::findOrFail($id));
    }

    // public function store(Request $request){
    //     $data = $request -> validate([
    //         'id' => 'requied|size:36|unique:overviews',
    //         'money' => 'required|numeric',
    //         'comment' =>  'required|max:255',
    //         'type' => 'required|"max:11", "in:Sissetulek, Väljaminek"',
    //         'date_added' => 'date|date_format:Y-m-d'
    //     ]);

    // }
}
