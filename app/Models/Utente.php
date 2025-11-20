<?php 
namespace App\Models;

use illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Likes;


class Utente extends Model{
    protected $table = 'utente';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'username',
        'password'
    ] ;

    public function posts() 
    {
        return $this->hasMany(Post::class, 'id_user');
    }
    
    public function likedpost() 
    {
        return $this->belongsToMany(Post::class,'likes','id_user','id_post')
                    ->withTimestamps();
    }
    //utente segue
    public function following(){
        return $this->belongsToMany(Utente::class,'follow','follower_id','followed_id')
                    ->withTimestamps();

    }

    //utente seguito da
    public function followers(){
        return $this->belongsToMany(Utente::class,'follow','followed_id','follower_id')
                    ->withTimestamps();

    }
}