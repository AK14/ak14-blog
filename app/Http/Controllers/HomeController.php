<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// модели
use App\Articles;

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
    public function index(Articles $art)
    {
        $articles = $art->paginate(5);
        return view('home',compact('articles'));
    }
}
