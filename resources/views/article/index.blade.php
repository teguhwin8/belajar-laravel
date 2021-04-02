@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
  <div class="container min-vh-100">
    <h1>{{ __('Articles') }}</h1>
    @guest
    @else
      <a href="/article/create" class="btn btn-primary mb-3">Bikin Artikel +</a>
    @endguest
    @foreach ($articles->chunk(3) as $article_chunk)
      <div class="row">
        @foreach ($article_chunk as $article)
          <div class="col-md-4">
            <div class="position-relative">
              <img src="images/{{ $article->thumbnail }}" alt="{{ $article->title }}" class="w-100 rounded-top">
              <div class="rounded shadow-sm p-3 mb-3 position-relative">
                <p><strong>{{ $article->title }}</strong></p>
                <p>{{ $article->subject }}</p>
              </div>
              <a href="/article/{{ $article->slug }}" class="stretched-link"></a>
            </div>
          </div>
        @endforeach
      </div>
    @endforeach

    <div class="d-flex justify-content-center mt-3">
      {{ $articles->links() }}
    </div>
  </div>

  @include('layouts.footer')
@endsection
