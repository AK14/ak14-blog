<?php

namespace App\Http\Controllers;

use App\Articles;
use App\User;
use App\Comments;
use App\Categories;

use Illuminate\Http\Request;

class articlesController extends Controller
{
    public function show(Articles $articles){

        return view('layouts.articles', compact('articles'));
    }
}
