@extends('layouts.app')

@section('title', $blog->title)

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="/images/{{ $blog->thumbnail }}" alt="{{ $blog->title }}" class="w-100">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h1>{{ $blog->title }}</h1>
        <p>{{ $blog->subject }}</p>
        <div class="d-flex mb-3">
          @guest
          @else
            <a href="/blog/{{ $blog->id }}/edit" class="btn btn-sm btn-outline-primary px-4 mr-2">Edit</a>
            <form action="/blog/{{ $blog->id }}" method="POST" class="mr-2">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
            </form>
          @endguest
          <a href="/blog" class="btn btn-info btn-sm">Kembali</a>
        </div>
      </div>
    </div>
  </div>
@endsection
