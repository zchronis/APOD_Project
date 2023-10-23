<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\users;
use App\Models\apods;
use App\Models\favorites;


class UserController extends Controller {
    public function signup(Request $request) {
        $user_name = $request->input("user_name");
        $user_pass = $request->input("user_pass");
        return view('welcome', compact('user_name','user_pass'));
    }
}

?>
