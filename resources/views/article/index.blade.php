@extends('layouts.app')

@section('content')
  <h1>Ini halaman artikel</h1>
  <a href="/article/create" class="btn btn-primary mb-3">Bikin Artikel +</a>
  @foreach ($articles as $article)
    <div class="card mb-3">
			<div class="card-body">
				<p><strong>{{ $article['title'] }}</strong></p>
				<p>{{ $article['subject'] }}</p>
			</div>
    </div>
  @endforeach

  {{ $articles->links() }}
@endsection
