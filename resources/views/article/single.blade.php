@extends('layouts.app')

@section('title', $article->title)

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="/images/{{ $article->thumbnail }}" alt="{{ $article->title }}" class="w-100">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->subject }}</p>
        <div class="d-flex mb-3">
          @guest
          @else
            <a href="/article/{{ $article->id }}/edit" class="btn btn-sm btn-outline-primary px-4 mr-2">Edit</a>
            <form action="/article/{{ $article->id }}" method="POST" class="mr-2">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
            </form>
          @endguest
          <a href="/article" class="btn btn-info btn-sm">Kembali</a>
        </div>
      </div>
    </div>
  </div>
@endsection
