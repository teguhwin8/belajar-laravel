@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
  <h1>Buat Artikel Baru</h1>
  <form action="/article" method="post" enctype="multipart/form-data">
    @csrf
    <x-form.input field="title" label="Judul" type="text" />
    <x-form.textarea field="subject" label="Subject" />
    <x-form.input-file field="thumbnail" label="Thumbnail" />
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
