<?php
namespace App;
// подключаем модели
use App\User;
use App\Comments;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = ['author','title','description','text'];

    private function author(){
      return $this->belongsTo(User::class,'author','id')->first();
    }

    public function getAuthor(){
        return $this->author();
    }

    private function categories(){
        return $this->belongsToMany('App\Categories','articles_categories','id_articles','id_categories');
    }

    public function getCategories(){
        return $this->categories()->get();
    }

    private function comments(){
        return $this->belongsToMany(Comments::class,'articles_comments','id_articles','id_comments');
    }

    public function getComments(){
        return $this->comments();
    }

//    метод для вывода комментариев к статье
    public function paginate_Comments(){
        $item = $this->getComments()->paginate(5);
        return $item;
    }

}