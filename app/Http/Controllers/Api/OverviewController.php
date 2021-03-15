<?php

namespace App\Http\Controllers\Api;

use App\Models\Overview;
use App\Http\Resources\OverviewIndexResource;
use App\Http\Controllers\Controller;

class OverviewController extends Controller
{
    public function index(){
        return OverviewIndexResource::collection(Overview::all());
    }

    public function show($id){
        return new OverviewIndexResource(Overview::findOrFail($id));
    }
}