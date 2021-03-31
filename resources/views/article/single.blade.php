@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->title }}</p>
    <a href="/article" class="btn btn-info btn-sm">Kembali</a>
@endsection