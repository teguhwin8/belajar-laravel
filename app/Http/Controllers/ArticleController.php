<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('article.index');
    }

    public function show($slug)
    {
        return view('article.single', compact('slug'));
    }
}
