<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $articles = Article::paginate(5);
        return view('article.index', compact('articles'));
    }
    
    /**
     * show
     *
     * @param  mixed $slug
     * @return void
     */
    public function show($slug)
    {
        return view('article.single', compact('slug'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('article.create');
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'subject' => 'required|min:10'
        ]);

        $article = new Article;
        $article->title = $request->title;
        $article->subject = $request->subject;
        $article->save();

        return redirect('/articles');
    }
}
