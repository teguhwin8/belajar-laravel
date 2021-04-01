<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(9);
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
        $article = Article::where('slug', $slug)->first();
        return view('article.single', compact('article'));
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

        Article::create([
            'title' => $request->title,
            'subject' => $request->subject
        ]);

        return redirect('/article');
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'subject' => 'required|min:10'
        ]);

        Article::find($id)->update([
            'title' => $request->title,
            'subject' => $request->subject
        ]);

        return redirect('/article');
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect('/article');
    }
}
