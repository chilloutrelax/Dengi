<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Overview;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    public function destroy($id)
    {   
        $user = User::where('id', $id);
        $overviews = Overview::where('user_id', $id);
        $overviews->delete();
        $user->delete();
    }

}
