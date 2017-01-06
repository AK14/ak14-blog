<?php
namespace  App;
// исрользуемые модели
use App\User;
use App\Articles;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model{

    protected $fillable = ['text','id_user'];
    public  $timestamps = false;

    private function articles(){
        return $this->belongsToMany(Articles::class,'articles_comments','id_articles','id_comments');
    }

    public function getArticles(){
        return $this->articles()->get();
    }

    private function author(){
        return $this->hasOne(User::class,'id','id_user');
    }

    public function getAuthor(){
        return $this->author();
    }

    public function add_comment(Comments $comments,$art){
        $comments->save();
        $comments->articles()->attach($comments->id,['id_articles'=>$art]);
    }

}