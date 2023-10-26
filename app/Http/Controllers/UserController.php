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
        if($request->user) {
            $user = $request->user;
        }
        else {
        validator(request()->all(), [
            'user_name' => ['required'],
            'user_pass' => ['required']
        ])->validate();

        $user_name = $request->user_name;
        $user_pass = $request->user_pass;

        $user = users::where('user_name', $user_name)->first();
        }
        
        if($user->password == $user_pass) {
            $user_favs = favorites::where('user_id', $user->user_id)->get();
            $fav_photos = [];
            foreach ($user_favs as $fav) {
                array_push($fav_photos, apods::where('apod_id', $fav->apod_id)->first());
            }
            return view("/favorites", compact('user', 'fav_photos'));
        }
        return redirect()->back()->withErrors(['user_name' => 'Invalid Credentials']);
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function saveAPOD(Request $request){
        // use the user_name to get a user object from the db
        $user = users::where('user_name', $request->user_name)->first();

        // create new apods object
        $apods = new apods;

        // populate it with the inputs from the form request
        $apods->copyright = $request->copyright;
        $apods->photo_date = $request->photo_date;
        $apods->explanation = $request->explanation;
        $apods->hdurl = $request->hdurl;
        $apods->url = $request->url;
        $apods->media_type = $request->media_type;
        $apods->title = $request->title;

        $apods->save();
        $temp_apod = apods::where("photo_date", $apods->photo_date)->first();
        
        // create new favorites relation
        // grab the apod_id from the newly created apod object
        $fav = new favorites;
        $fav->user_id = $user->user_id;
        $fav->apod_id = $temp_apod->apod_id;

        
        $fav->save();

        return redirect()->route('login', compact('user'));
    }
}

?>
