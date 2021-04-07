@extends('layouts.app')

@section('title', $course->title)

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        @isset($course->thumbnail)
          <img src="/images/{{ $course->thumbnail }}" alt="{{ $course->title }}" class="w-100">
        @endisset
      </div>
    </div>
    <div class="row">
      <div class="col py-4">
        <h1 class="mb-0 pb-0">{{ $course->title }}</h1>
        <p class="mt-3">{{ $course->subject }}</p>
        <div class="d-flex mb-3">
          @auth
            <a href="/course/join/{{ $course->id }}" class="btn btn-sm btn-outline-primary mr-2">Join</a>
            <a href="/course/unjoin/{{ $course->id }}" class="btn btn-sm btn-outline-danger mr-2">Unjoin</a>
          @endauth
          <a href="/course" class="btn btn-sm btn-outline-secondary mr-2">Kembali</a>
        </div>
      </div>
    </div>
  </div>
@endsection
