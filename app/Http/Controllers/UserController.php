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
        $user->password = bcrypt($request->user_pass);
        $user->save();
        return redirect()->route('welcome');
    }

    public function login(){
        validator(request()->all(), [
            'user_name' => ['required'],
            'user_pass' => ['required']
        ])->validate();

        if(auth()->attempt(request()->only(['user_name','user_pass']))){
            return redirect('welcome');
        }
        return redirect()->back()->withErrors(['user_name' => 'Invalid Credentials']);
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}

?>
