<?php

namespace App\Http\Controllers;

use App\Blog;
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
        $blogs = Blog::orderBy('id', 'desc')->paginate(9);
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

        Blog::create([
            'title' => $request->title,
            'subject' => $request->subject,
            'thumbnail' => $image_name,
            'user_id' => Auth::user()->id
        ]);

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
        $images = $blog->thumbnail;
        if ($images != null) {
            \File::delete(public_path('images/' . $images));
        }
        $blog->delete();

        return redirect('/blog');
    }
}
