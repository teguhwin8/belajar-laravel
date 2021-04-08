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
      <div class="col py-4">
        <h1 class="mb-0 pb-0">{{ $blog->title }}</h1>
        <small class="text-muted">Penulis: {{ $blog->user->username }} | {{ $blog->created_at->diffForHumans() }}</small>
        <p class="mt-3">{{ $blog->subject }}</p>
        <div class="d-flex mb-3">
          @auth
            @if ($blog->user_id == Auth::user()->id)
              <a href="/blog/{{ $blog->id }}/edit" class="btn btn-sm btn-outline-primary px-4 mr-2">Edit</a>
              <form action="/blog/{{ $blog->id }}" method="POST" class="mr-2">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
              </form>
            @endif
          @endauth
          <a href="/blog" class="btn btn-info btn-sm">Kembali</a>
        </div>
      </div>
    </div>
  </div>
@endsection
