<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($user)
    {
        $temp = User::where('username' ,$user)->first();  

        return auth()->user()->following()->toggle($temp->profile); 
    }
}
