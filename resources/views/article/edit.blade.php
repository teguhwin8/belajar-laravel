@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
  <h1>Edit Artikel</h1>
  <form action="/article/{{ $article->id }}" method="post">
    @csrf
    @method('PUT')
    <x-form.input field="title" label="Judul" type="text" value="{{ $article->title }}"/>
    <x-form.textarea field="subject" label="Subject" value="{{ $article->subject }}"/>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
