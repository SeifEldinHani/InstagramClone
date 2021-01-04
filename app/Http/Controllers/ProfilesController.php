<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    public function index($user)
    {
        
        $temp = User::where('username' ,$user)->firstOrFail();
        
        $follows = (auth()->user()) ? auth()->user()->following->contains($temp->id) : false;


        return view('profile.index' , [
            'user' => $temp,
            'follows' => $follows
        ]);
    }

    public function edit($user)
    {
        $temp = User::where('username' ,$user)->firstOrFail();     
        return view("profile.edit" , [
            'user' => $temp
        ]);
    }
    public function update($user)
    {


        $data = request()->validate([
            'title' => 'required',
            'descrpiton' => 'required',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$temp->username}");
    }
}
