@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
  <h1>Buat Artikel Baru</h1>
  <form action="/article" method="post">
    @csrf
    <x-form.input field="title" label="Judul" type="text" />
    <x-form.textarea field="subject" label="Subject" />
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
