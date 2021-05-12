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
      <x-form.input field="tags" label="Tags" type="text"/>
      <x-form.input-file field="thumbnail" label="Thumbnail" />
      <div class="d-flex justify-content-end">
        <a href="/blog" class="btn mr-3">Kembali</a>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

    <script>
      var inputTag = document.querySelector('#tags');
      var tagify = new Tagify(inputTag, {
        whitelist: [{
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
      });

      let tags = [];
      @foreach($blog->tags as $tag)
        tags.push("{{ $tag->title }}")
      @endforeach

      tagify.addTags(tags);

    </script>
  </div>
@endsection
