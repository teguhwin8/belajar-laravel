<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = [
            [
                'title' => 'Ini judul artikel pertama',
                'subject' => 'Ini subject artikel pertama'
            ],
            [
                'title' => 'Ini judul artikel kedua',
                'subject' => 'Ini subject artikel kedua'
            ],
            [
                'title' => 'Ini judul artikel ketiga',
                'subject' => 'Ini subject artikel ketiga'
            ],
        ];
        return view('article.index', compact('articles'));
    }

    public function show($slug)
    {
        return view('article.single', compact('slug'));
    }
}
