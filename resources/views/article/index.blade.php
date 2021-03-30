@extends('layouts.app')

@section('content')
  <h1>Ini halaman artikel</h1>

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
