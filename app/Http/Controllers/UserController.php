<?php

namespace App\Http\Controllers;

use App\User;
use App\Classes\Photo;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image;

use Illuminate\Http\Request;

/*
 * Контроллер для управления данными пользователя сайта
 * здесь будут методы для изменения Аватврки,
 * основных данных (рост, вес и др)
 */
class UserController extends Controller
{
    private $photo;
    private $user;

    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function profile(){
        $user = Auth::user();
        return view('layouts/profile',compact('user'));
    }

    /*
     * получаем форму для изменения данных пользователя
     */
    public function edit()
    {
        $user = Auth::user();
        return view('layouts/profile_edit',compact('user'));
    }

    /*
     * сохраняем данные полученые из формы
     * @param User $user
     * @param Request $request
     */
    public function save(User $user,Request $request)
    {
        if (!is_null($request->file('image')))
        {
            $this->avatar($user,$request->file('image'));
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->weight = $request->weight;
        $user->height = $request->height;
        $user->save();

        return redirect()->route('profile');
    }

    /**
     * Создаем аватар пользователя
     * @param User $user
     * @param UploadedFile $file получаем файл из формы
     * @return \Illuminate\Http\RedirectResponse
     */
    public function avatar(User $user,UploadedFile $file)
    {
        $this->user = $user;
        if (!$file)
        {
            return redirect()->back();
        }elseif (isset($this->user->photo->name)) // если у пользователя уже есть аватар
        {
            unlink($this->user->photo->path); // удаляем существующий аватар пользователя
            unlink($this->user->photo->th_path); // удаляем существующий мини_аватар пользователя
            $photo = $this->create_avatar($file);
            $this->user->updatePhoto($photo);
        }else
        {
            $photo = $this->create_avatar($file);
            $this->user->attachPhoto($photo);
        }
    }

    /**
     * @param UploadedFile $file
     * @return Photo
     */
    public function create_avatar(UploadedFile $file)
    {
        $this->photo = $file;
        $avatar = $this->newPhoto(); // создаем имена для вставки в БД
        $this->photo->move('users_img/',$avatar->name);
        $this->makeThumbnail($avatar->path,$avatar->th_path);
        return $avatar;
    }

    /*
     * создаем новый объект Photo
     */
    private function newPhoto()
    {
       return new Photo([
            'name'=> $this->avatarName()
       ]);
    }

    /**
     * Создаем уникальное имя для файла
     * берем имя файла без расширения
     * к отметке времени добовляем имя файла и нужное расширение
     * @return string
     */
    private function avatarName()
    {
        $name = $this->photo->getClientOriginalName();
        $val  = mb_strimwidth($name,0,strrpos($name,'.'));
        return time().'_'.$val.'.png';
    }

    /**
     * Создаем уменьшеную копию аватара
     * @param $file
     * @param $to
     */
    private function makeThumbnail($file, $to)
    {
        Image::make($file)->fit(150)->save($to,100);
    }

}


