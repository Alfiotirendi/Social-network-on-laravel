<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utente;


class Post extends Model {
    protected $table = 'post';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'titolo',
        'descrizione',
        'id_user'
    ];

    public function utente() {
        return $this->belongsTo(Utente::class, 'id_user');
    }

    public function likedBy() {
        return $this->belongsToMany(Utente::class,'likes','id_post','id_user')
                    ->withTimestamps();
    }
}