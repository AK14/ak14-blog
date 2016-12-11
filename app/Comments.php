<?php
namespace  App;
// исрользуемые модели
use App\User;
use App\Articles;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model{
    public function articles(){
        return $this->belongsToMany(Articles::class,'articles_comments','id_articles','id_comments');
    }
}