@extends('layouts.app')

@section('title', 'Blog')

@section('content')
  <div class="container min-vh-100">
    @auth
      <a href="/blog/create" class="btn btn-primary mb-3">Tulis Artikel +</a>
    @endauth
      <div class="row" data-masonry='{"percentPosition": true }'>
        @foreach ($blogs as $blog)
          <div class="col-md-4">
            <div class="position-relative">
              <img src="images/{{ $blog->thumbnail }}" alt="{{ $blog->title }}" class="w-100 rounded-top">
              <div class="rounded shadow-sm p-3 mb-3 position-relative">
                <p class="text-ellipsis-2"><strong>{{ $blog->title }}</strong></p>
                <p class="text-ellipsis-3">{{ $blog->subject }}</p>
              </div>
              <a href="/blog/{{ $blog->slug }}" class="stretched-link"></a>
            </div>
          </div>
        @endforeach
      </div>

    <div class="d-flex justify-content-center mt-3">
      {{ $blogs->links() }}
    </div>
  </div>

  @include('layouts.footer')
@endsection
