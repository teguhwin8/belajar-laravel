@extends('layouts.app')

@section('title', $blog->title)

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="/images/{{ $blog->thumbnail }}" alt="{{ $blog->title }}" class="w-100">
      </div>
    </div>
    <div class="row">
      <div class="col py-4">

        {{-- Action Button --}}
        <div class="d-flex mb-3">
          @auth
            @if ($blog->user_id == Auth::user()->id)
              <a href="/blog/{{ $blog->id }}/edit" class="btn btn-sm btn-outline-primary px-4 mr-2">Edit</a>
              <form action="/blog/{{ $blog->id }}" method="POST" class="mr-2">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
              </form>
            @endif
          @endauth
          <a href="/blog" class="btn btn-info btn-sm">Kembali</a>
        </div>

        {{-- Post --}}
        <div class="blog-post">
          <h1 class="mb-0 pb-0">{{ $blog->title }}</h1>
          <small class="text-muted">Penulis: {{ $blog->user->username }} | {{ $blog->created_at->diffForHumans() }}</small>
          <p class="mt-3">{{ $blog->subject }}</p>
        </div>

        <hr>

        {{-- Comments --}}
        <div class="comments my-3">
          <strong> {{ $blog->comments->count() }} Komentar </strong>
          @foreach ($blog->comments as $comment)
            <div class="p-3 bg-white rounded my-3 shadow-sm position-relative">
              <div class="float-right">
                <button class="btn btn-sm mr-2" type="button" data-toggle="modal" data-target="#showEditComment{{ $comment->id }}">Edit</button>
                <a href="#" class="btn btn-sm">Hapus</a>
              </div>
              <div class="comment_user">
                <strong>{{ $comment->user->username }}</strong>
              </div>
              <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
              <p class="p-0 m-0">{{ $comment->subject }}</p>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="showEditComment{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="showEditComment{{ $comment->id }}Label" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <form action="/comments/{{ $comment->id }}" method="POST">
                      @csrf
                      @method('PUT')
                      <x-form.textarea field="subject" label="Edit komentar" value="{{ $comment->subject }}" />
                      <div class="float-right d-flex">
                        <button class="btn btn-sm mr-3" data-dismiss="modal">batal</button>
                        <button class="btn btn-primary d-flex ml-auto btn-sm">{{ __('Reply') }}</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

          {{-- Add Comment Form --}}
          <form action="/blog/{{ $blog->id }}/comments" method="POST">
            @csrf
            <x-form.textarea field="subject" label="Tulis Komentar" />
            <button class="btn btn-primary d-flex ml-auto">{{ __('Reply') }}</button>
          </form>

        </div>

      </div>
    </div>
  </div>
@endsection
