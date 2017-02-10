<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
// модели
use App\Articles;
use App\Categories;
// подключаем фассад для работы с БД
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//расширение для работы с датой
use Carbon\Carbon;

// тестовые подключения

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Articles $articles,Categories $categories)
    {


        $articles = $articles->paginate(5);
        return view('home',compact('articles'));
    }

    public function categories(Articles $articles, Categories $categories)
    {
        $art = DB::table('articles')
            ->join('articles_categories','id','=','id_articles')
            ->select('id')
            ->where('id_categories',$categories->id)->get()->pluck('id')
            ->toArray();


        $articles = $articles->whereIn('id',$art)->paginate(5);
        return view('home',compact('articles'));

    }

    public function profile(){
        $user = Auth::user();
        return view('layouts/profile',compact('user'));
    }

    public function calendar(){
        $date = Carbon::now('Europe/Minsk');

        return view('layouts/calendar', compact('date'));
    }
}
