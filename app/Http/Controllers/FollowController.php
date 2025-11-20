<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utente;

class FollowController extends Controller{

        public function follow ( $id_user, Request $request){
        $id = $request->session()->get('id');
        $follower= Utente::findOrFail($id);
        $followedUser = Utente::findOrFail($id_user);

        $alreadyFollowed = $follower->following()->where('followed_id',$followedUser->id)->exists();
        if (!$alreadyFollowed){
            $follower->following()->attach($id_user);
            $follow = true;
        }
        else {
            $follower->following()->detach($id_user);
            $follow = false;
        }

        $followers_count = $followedUser->followers()->count();
        return response()->json([
            'followed'=>$follow,
            'followers_count'=>$followers_count
        ]);
    }
}