@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
  <div class="container">
    <h1>Edit Artikel</h1>
    <form action="/article/{{ $article->id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <x-form.input field="title" label="Judul" type="text" value="{{ $article->title }}" />
      <x-form.textarea field="subject" label="Subject" value="{{ $article->subject }}" />
      <img src="/images/{{ $article->thumbnail }}" alt="{{ $article->title }}" class="img-thumbnail img-fluid" width="200">
      <x-form.input-file field="thumbnail" label="Thumbnail" />
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
