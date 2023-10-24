<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\users;
use App\Models\apods;
use App\Models\favorites;


class UserController extends Controller {
    public function signUp() {
        return view('signUp');
    }
    
    public function register(Request $request){
        $request->validate([
            'uName' => 'required|string',
            'password' => 'required|string'
        ]);
    
        $user = new User;
        $user->user_name = $request->uName;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('welcome');
    }
}

?>
