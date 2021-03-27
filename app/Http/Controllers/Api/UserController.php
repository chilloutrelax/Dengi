<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    public function updatePwd($id) {
        
    }

    public function destroy($id)
    {
        $deleted = User::find($id)->delete();
        if($deleted){
            return true;
        }
    }
}
