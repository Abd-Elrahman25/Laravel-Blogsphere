<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){


        $db_posts = post::all();

        return view('posts.index',['posts'=>$db_posts]);
    }

    public function show(Post $post){

        return view('posts.show',['post'=>$post]);
    }

    public function create(){

        $user = auth()->user();

        return view('posts.create',['user'=>$user]);
    }

    public function store(){

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);


        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;

        post::create([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$post_creator,
        ]);

        return to_route('posts.index');
    }

    public function edit(Post $post){

        $user = auth()->user();

        if($post->user_id != $user->id){

         abort(403, 'Unauthorized action.');

        }
        return view('posts.edit',['user'=>$user, 'post'=>$post]);
    }

    public function update($postId){

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);

        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;

        $post = Post::find($postId);

        $user = auth()->user();

        if($post->user_id != $user->id){

         abort(403, 'Unauthorized action.');

        }

        
        $post->update([
            'title' => $title,
            'description' => $description,
            'user_id'=>$post_creator,
        ]);

        return to_route('posts.show',$postId);

    }

    public function destroy($postId){

        $post = post::find($postId);
       

        $user = auth()->user();

        if($post->user_id != $user->id){

         abort(403, 'Unauthorized action.');

        }

        $post->delete();

        return to_route('posts.index');
    }
}
