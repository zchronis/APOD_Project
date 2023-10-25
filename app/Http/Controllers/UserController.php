<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\users;
use App\Models\apods;
use App\Models\favorites;


class UserController extends Controller {
    public function signUp() {
        return view('/signUp');
    }
    
    public function register(Request $request){
        $request->validate([
            'user_name' => 'required|string|unique:users',
            'user_pass' => 'required|string'
        ]);

        
        $user = new users;
        $user->user_name = $request->user_name;
        $user->password = $request->user_pass;
        $user->save();
        return redirect()->route('welcome');
    }

    public function login(Request $request){
        validator(request()->all(), [
            'user_name' => ['required'],
            'user_pass' => ['required']
        ])->validate();

        $user_name = $request->user_name;
        $user_pass = $request->user_pass;

        $user = users::where('user_name', $user_name)->first();
        
        if($user->password == $user_pass) {
            $user_favs = favorites::where('user_id', $user->user_id)->get();
            $fav_photos = [];
            foreach ($user_favs as $fav) {
                array_push($fav_photos, apod::where('apod_id', $fav->apod_id));
            }
            return view("/favorites", compact('user', 'fav_photos'));
        }
        return redirect()->back()->withErrors(['user_name' => 'Invalid Credentials']);
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}

?>
