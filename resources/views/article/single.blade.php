@extends('layouts.app')

@section('content')
  <h1>{{ $article->title }}</h1>
  <p>{{ $article->title }}</p>
  <div class="d-flex mb-3">
    <a href="/article/{{ $article->id }}/edit" class="btn btn-sm btn-outline-primary px-4 me-2">Edit</a>
    <form action="/article/{{ $article->id }}" method="POST" class="me-2">
      @csrf
      @method('delete')
      <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
    </form>
    <a href="/article" class="btn btn-info btn-sm">Kembali</a>
  </div>
@endsection
