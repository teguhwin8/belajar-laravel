<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(6);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|min:3|max:255',
            'subject' => 'required|min:10'
        ]);

        $image_name = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();

        $request->thumbnail->move(public_path('images'), $image_name);

        $blog = Auth::user()->blogs()->create([
            'title' => $request->title,
            'subject' => $request->subject,
            'thumbnail' => $image_name
        ]);

        $blog->tags()->sync($this->getTags($request->tags));

        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        if ($blog == null) {
            abort(404);
        }
        return view('blog.single', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        if (Auth::user()->id != $blog->user_id) {
            abort(403);
        }

        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|min:3|max:255',
            'subject' => 'required|min:10'
        ]);

        $blog = Blog::find($id);

        if (Auth::user()->id != $blog->user_id) {
            abort(403);
        }

        $blog->tags()->sync($this->getTags($request->tags));

        if ($request->thumbnail != null) {
            $image_name = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images'), $image_name);
            $blog->update([
                'title' => $request->title,
                'subject' => $request->subject,
                'thumbnail' => $image_name
            ]);
        } else {
            $blog->update([
                'title' => $request->title,
                'subject' => $request->subject
            ]);
        }

        

        return redirect('blog' . '/' . $blog->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (Auth::user()->id != $blog->user_id) {
            abort(403);
        }

        $images = $blog->thumbnail;
        if ($images != null) {
            \File::delete(public_path('images/' . $images));
        }
        $blog->delete();

        return redirect('/blog');
    }

    private function getTags($tags)
    {
        $tags_id = [];
        $tagsJson = json_decode($tags);
        foreach ($tagsJson as $tag) {
            $tags = Tag::find($tag->id);
            $tags_id[] = $tags->id;
        }
        return $tags_id;
    }
}
