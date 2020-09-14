<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();

        if($file =$request->file('image')){

        $name = $file->getClientOriginalName();
        $file->move('imagets',$name);
        $input['image'] =$name;

                                             }
        $input['user_id']= Auth::user()->id ;
        Post::create($input);
        return redirect('/profile/'.Auth::user()->id );





    }

/*
       if(Auth::user()->posts){
        $imagePath = request('image')->store('uploads', 'public');
        $post = new Post;
        $post->caption = $data['caption'];
        $post->image = $imagepath;
        $post->save();
*/
/*
           $post = new Post;

           $file = $request->file('image');

           $name =   $file->getClientOriginalName();
           $file->move('images',$name);
           $post->image = $name;
           $post->caption = $request['caption'];


          dd( $post);
/*

          /*
        $post = new Post;
        $post->caption = $data['caption'];
        $post->image = $imagepath;
        $post->save();
        */



     public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

}
