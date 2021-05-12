@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
  <div class="container">
    <h1>{{ __('Create New Article') }}</h1>
    <form action="/blog" method="post" enctype="multipart/form-data">
      @csrf
      <x-form.input field="title" label="Judul" type="text" />
      <x-form.textarea field="subject" label="Subject" />
      <x-form.input field="tags" label="Tags" type="text" />
      <x-form.input-file field="thumbnail" label="Thumbnail" />
      <div class="d-flex justify-content-end">
        <a href="/blog" class="btn mr-3">Kembali</a>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

    <script>
      var inputTag = document.querySelector('#tags');
      new Tagify(inputTag, {
        whitelist: [
          {
            id: 1,
            value: 'HTML'
          },
          {
            id: 2,
            value: 'CSS'
          },
          {
            id: 3,
            value: 'JS'
          }
        ]
      })
    </script>
  </div>
@endsection
