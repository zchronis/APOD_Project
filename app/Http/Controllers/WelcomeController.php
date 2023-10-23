<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\users;
use App\Models\apods;
use App\Models\favorites;

class WelcomeController extends Controller
{
    public function show() {
        return view('welcome');
    }
}
