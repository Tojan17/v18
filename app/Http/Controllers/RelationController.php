<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use App\Models\Tag;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    function users(){
        $users = User::with('profile')->get();
        return view('relations.users',compact('users'));
    }


    function profile($id){
        $profile = Profile::with('user')->find($id);
        dd($profile->user->name);
    }

    function posts(){
        // $posts = Post::all();
        // $posts = Post::latest('id')->get();
        $posts = Post::with('user', 'comments')->withCount('comments')->latest('id')->paginate(12);

        return view('relations.posts', compact('posts'));
    }

    function posts_single($id){
        $post = Post::with('user', 'comments.user')->withCount('comments')->findOrFail($id);
        // dd($post);

        return view('relations.posts_single', compact('post'));
    }

    function posts_tag($id){
        $tag = Tag::with('posts')->findOrFail($id);

        $posts = $tag->posts()->paginate(12);
        return view('relations.posts', compact('posts'));



        // dd($tag);
    }



}
