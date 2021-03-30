<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('extra');
    }

    public function show($slug)
    {
        return view('single', compact('slug'));
    }
}
