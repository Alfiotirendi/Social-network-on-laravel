<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Utente;
use Illuminate\Http\Request;


class ViewController extends Controller
{
    public function home(Request $request)
    {
        $id = $request->session()->get('id');
        $utente = Utente::find($id);
        $followingId = $utente->following()->pluck('utente.id');
        $followedPost = Post::whereIn('id_user',$followingId)
                        ->with('utente')
                        ->withCount('likedBy')
                        ->latest()
                        ->get();
        $suggestedPost = Post::whereNotIn('id_user',$followingId)
                        ->where('id_user','!=',$id)
                        ->with('utente')
                        ->withCount('likedBy')
                        ->latest()
                        ->get();
        return view('home', compact('followedPost','suggestedPost','utente'));
    }

    public function viewAccount($id_user, Request $request){
        $id = $request->session()->get('id');
        $utente= Utente::find($id);
        $profile = Utente::withCount('followers')->withCount('following')->find($id_user);
        $posts = Post::where('id_user',$profile->id)->with('utente')->withCount('likedBy')->latest()->get();
        
        return view('profile', compact('posts','utente','profile'));
    }

    public function createPostform(Request $request){
        $id = $request->session()->get('id');
        $utente= Utente::find($id);
        return view('createpost',compact('utente'));
    }

    public function settings(Request $request){
        $id = $request->session()->get('id');
        $utente = Utente::find($id);
        return view('settings',['utente' => $utente]);
    }

     public function likedPost(Request $request)
    {
        $id = $request->session()->get('id');
        $utente = Utente::find($id);
        $posts = Post::whereHas('likedBy',function($query) use($id){
            $query->where('id_user',$id);
        })->with('utente')->withCount('likedBy')->latest()->get();

        return view('likedPost',compact('utente','posts'));
    }

    public function followers($id_user, Request $request){
        $id = $request->session()->get('id');
        $utente=Utente::find($id);
        $profile = Utente::find($id_user);
        $follower = $profile->followers()->get();

        return view('Followers',compact('follower','profile','utente'));
    }


    public function followed($id_user, Request $request){
        $id = $request->session()->get('id');
        $utente=Utente::find($id);
        $profile = Utente::find($id_user);
        $followed = $profile->following()->get();

        return view('Followed',compact('followed','profile','utente'));
    }




    public function searchAccount(Request $request){
            $id = $request->session()->get('id');
            $utente= Utente::find($id);
            $query= $request->input('username');
            if(isset($query)){
                $first=false;
                $query=$request->input('username');
                $users=Utente::where('username','like',"%{$query}%")->get();
                return view('Search',compact('users','first','utente','query'));
            }
            else{
                $first = true;
                return view('Search',compact('first','utente'));
            }
    }



}