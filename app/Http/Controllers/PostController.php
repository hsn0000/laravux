<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class PostController extends Controller
{
    public function posts(){
         
        $post = Post::orderBy('id', 'desc')->get();
        return response()->json(['posts' => $post], 200);  
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
          'title' => 'required|unique:posts|max:255',
          'body' => 'required',
       ]);
 
       $post = new Post;  
       $post->title = $request->title;
       $post->body = $request->body; 
       $post->slug = Str::slug($post->title, '-'); 
 
       $post->save();
 
       return response()->json(['post' => $post], 201); 

    }

    public function update(Request $request, $slug)
    {
       $validated = $request->validate([
          'title' => 'required|max:255',
          'body' => 'required',
       ]);
 
       $post = Post::where('slug', $slug)->firstOrFail();
       $post->title = $request->title;
       $post->body = $request->body;  
 
       $post->save();
 
       return response()->json(['post' => $post], 201); 
 
    }

    public function destroy($slug){

        $post = Post::where('slug', $slug);

        if($post->get()->isEmpty()) {
            return response()->json(
                array(
                    'success' => false,
                    'errors' => [
                        'message' => 'Post delete not found!'
                    ]
                ), 
                404
            ); 
        }

        $post->delete();
        
        return response()->json(
            array(
                'success' => true,
                'data' => [
                    'message' => 'Post delete success!'
                ]
            ),
            202
        ); 
     }
}
