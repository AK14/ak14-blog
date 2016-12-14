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
    public function index(Articles $articles,Categories $categories,Request $request)
    {
        $articles = $articles->paginate(5);
        $categories = $categories->all();
        return view('home',compact('articles','categories'));
    }
}
