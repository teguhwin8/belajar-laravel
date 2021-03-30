@extends('layouts.app')

@section('content')
    <h1>Ini halaman artikel</h1>

    @foreach ($articles as $article)
        <p><strong>{{ $article['title'] }}</strong></p>
        <p>{{ $article['subject'] }}</p>
    @endforeach

    {{ $articles->links() }}
@endsection