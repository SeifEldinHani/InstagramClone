<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id'); 

        $posts = Post::whereIn('user_id' , $users)->latest()->get(); 

        return view('posts.index' , [

            'posts' => $posts
        ]);

    }



    public function create()
    {
        return view("posts.create");
    }
    public function store()
    {   $data = request()->validate(
        [
            'Caption' =>'required' , 
            'image' => ["required" , "image"]
            
        ]);
        $imagepath = (request('image')->store('uploads' , 'public'));
        auth()->user()->posts()->create([
            'Caption' => $data['Caption'], 
            'image' => $imagepath
        ]); 
        return redirect('/profile/' . auth()->user()->username);
    }
    public function show(\App\Models\Post $post)
    {
        return view ('posts.show' , compact('post'));
    }
}