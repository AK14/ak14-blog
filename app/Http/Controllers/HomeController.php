<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// модели
use App\Articles;
use App\Categories;
// подключаем фассад для работы с БД
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Articles $articles,Categories $categories)
    {
        $articles = $articles->paginate(5);
        $categories = $categories->all();
        return view('home',compact('articles','categories'));
    }

    public function categories(Articles $articles, Categories $categories)
    {
        $art = DB::table('articles')
            ->join('articles_categories','id','=','id_articles')
            ->select('id')
            ->where('id_categories',$categories->id)->get()->pluck('id')
            ->toArray();

//        dd($art);

          $articles = $articles->whereIn('id',$art)->paginate(5);
//            dd($articles);
        $categories = $categories->all();
        return view('home',compact('articles','categories'));

    }
}
