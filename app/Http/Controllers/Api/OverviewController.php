<?php

namespace App\Http\Controllers\Api;

use App\Models\Overview;
use App\Http\Controllers\Controller;

class OverviewController extends Controller
{
    public function index(){
        return Overview::all();
    }

    public function show($id){
        return Overview::findOrFail($id);
    }
}
