<?php
namespace App;
// подключаем модели
use App\User;
use App\Comments;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = ['author','title','description','text'];

    public function author(){
      return $this->belongsTo(User::class,'author','id')->first();
    }

    public function categories(){
        return $this->belongsToMany('App\Categories','articles_categories','id_categories','id_articles');
    }

    public function getCategories(){
        return $this->categories()->get();
    }

    public function comments(){
        return $this->belongsToMany(Comments::class,'articles_comments','id_articles','id_comments');
    }
}