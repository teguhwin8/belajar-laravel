@extends('layouts.app')

@section('content')
  <h1>Ini halaman artikel</h1>
  <a href="/article/create" class="btn btn-primary mb-3">Bikin Artikel +</a>
  @foreach ($articles->chunk(3) as $article_chunk)
    <div class="row">
      @foreach ($article_chunk as $article)
        <div class="col-md-4">
          <div class="rounded shadow-sm p-3 mb-3 position-relative">
              <p><strong>{{ $article->title }}</strong></p>
              <p>{{ $article->subject }}</p>
              <a href="/article/{{ $article->id }}" class="stretched-link"></a>
          </div>
        </div>
      @endforeach
    </div>
  @endforeach

  <div class="d-flex justify-content-center mt-3">
    {{ $articles->links() }}
  </div>
@endsection
