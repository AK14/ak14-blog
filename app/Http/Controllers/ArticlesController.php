<?php

namespace App\Http\Controllers;

use App\Articles;
use App\User;
use App\Comments;
use App\Categories;
use Carbon\Carbon;

use Illuminate\Http\Request;

class articlesController extends Controller
{
    public function show(Articles $articles){

        return view('layouts.articles', compact('articles'));
    }

    public function addComment(Request $request, Articles $articles,Comments $comments){

        // берез id articles
        $art = $articles->id;

        // создаем модель Comments
        $data = new Comments;
            $data->text = $request->text;
            $data->date = Carbon::now('Europe/Minsk');
            $data->id_user = $request->user()->id;

        // вызываем метод класса для записи комментария
        $comments->add_comment($data,$art);

        // редирект
        return back();
    }
}
