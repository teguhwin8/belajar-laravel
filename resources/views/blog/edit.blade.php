@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
  <div class="container">
    <h1>Edit Artikel</h1>
    <form action="/blog/{{ $blog->id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <x-form.input field="title" label="Judul" type="text" value="{{ $blog->title }}" />
      <x-form.textarea field="subject" label="Subject" value="{{ $blog->subject }}" />
      <img src="/images/{{ $blog->thumbnail }}" alt="{{ $blog->title }}" class="img-thumbnail img-fluid" width="200">
      <x-form.input-file field="thumbnail" label="Thumbnail" />
      <div class="d-flex justify-content-end">
        <a href="/blog" class="btn mr-3">Kembali</a>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
