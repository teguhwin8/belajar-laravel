@extends('layouts.app')

@section('content')
  <h1>Edit Artikel</h1>
  <form action="/article/{{ $article->id }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Judul Artikel</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ? old('title') : $article->title }}">
      @error('title')
        <div class="invalid-feedback my-1">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="subject" class="form-label">Subject</label>
      <textarea class="form-control @error('subject') is-invalid @enderror" id="subject" rows="5" name="subject">{{ old('subject') ? old('subject') : $article->subject }}</textarea>
      @error('subject')
        <div class="invalid-feedback my-1">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
