<?php
namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'Users_Photo';
    public $timestamps = false;
    protected $fillable = ['name','path','th_path','id_user'];

    public function setNameAttribute($name)
    {
        $this->attributes['name']    = $name;
        $this->attributes['path']    = 'users_img/' .$name;
        $this->attributes['th_path'] = 'users_img/th-' .$name;
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class,'id_user','id');
    }
}
