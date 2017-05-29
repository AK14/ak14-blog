<?php

namespace App;

use App\Classes\Photo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function photo()
    {
        return $this->hasOne(Photo::class,'id_user','id');
    }

    public function attachPhoto($photo)
    {
        return $this->photo()->save($photo);
    }

    public function updatePhoto($photo)
    {
        return $this->photo()->update([
            'name'    => $photo->name,
            'path'    => $photo->path,
            'th_path' => $photo->th_path
        ]);
    }
}
