@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->title }}</p>
    <a href="/articles" class="btn btn-info btn-sm">Kembali</a>
@endsection