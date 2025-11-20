<?php
namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Utente;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller{

    public function createPost(Request $request){
        $request->validate([
            'titolo'=>'required|max:100',
            'descrizione'=>'required|max:500',
        ]);

        $id_user = $request->session()->get('id');

        Post::create([
            'titolo'=>$request->titolo,
            'descrizione'=>$request->descrizione,
            'id_user'=>$id_user
        ]);

        return redirect()->route('home');
    }


    public function like ( $id_post, Request $request){
        $id_user = $request->session()->get('id');
        $post = Post::findOrFail($id_post);

        $alreadyLiked = $post->likedBy()->where('id_user',$id_user)->exists();
        if (!$alreadyLiked){
            $post->likedBy()->attach($id_user);
            $liked = true;
        }
        else {
            $post->likedBy()->detach($id_user);
            $liked = false;
        }

        $post->load('likedBy');
        return response()->json([
            'liked'=>$liked,
            'likes_count'=>$post->likedBy()->count(),
        ]);
    }

    public function deletePost($id_post, Request $request){
        $post = Post::findOrFail($id_post);
        $post->delete();
        return redirect()->back();
    }

}