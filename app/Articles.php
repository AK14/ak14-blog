<?php
namespace App;
// подключаем модели
use App\User;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = ['author','title','description','text'];

    public function author()
    {
      return $this->belongsTo(User::class,'author','id')->first();
    }
}