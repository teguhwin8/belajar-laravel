@extends('layouts.app')

@section('content')
  <h1>Ini halaman artikel</h1>
  <a href="/article/create" class="btn btn-primary mb-3">Bikin Artikel +</a>
  @foreach ($articles as $article)
    <div class="card mb-3">
			<div class="card-body">
				<p><strong>{{ $article->title }}</strong></p>
				<p>{{ $article->subject }}</p>
        <a href="/article/{{ $article->id }}" class="btn btn-sm btn-outline-primary px-4">Baca</a>
        <a href="/article/{{ $article->id }}/edit" class="btn btn-sm btn-outline-primary px-4">Edit</a>
        <form action="/article/{{ $article->id }}" method="POST">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
        </form>
			</div>
    </div>
  @endforeach

  {{ $articles->links() }}
@endsection
