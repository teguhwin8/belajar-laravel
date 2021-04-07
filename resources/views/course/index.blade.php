@extends('layouts.app')

@section('title', 'Course')

@section('content')
  <div class="container min-vh-100">
    <div class="row" data-masonry='{"percentPosition": true }'>
      @foreach ($courses as $course)
        <div class="col-md-4">
          <div class="position-relative">
            @isset($course->thumbnail)
              <img src="images/{{ $course->thumbnail }}" alt="{{ $course->title }}" class="w-100 rounded-top">
            @endisset
            <div class="rounded shadow-sm p-3 mb-3 position-relative">
              <p class="text-ellipsis-2 p-0 m-0"><strong>{{ $course->title }}</strong></p>
              <p class="text-ellipsis-3 mt-3">{{ $course->subject }}</p>
            </div>
            <a href="/course/{{ $course->slug }}" class="stretched-link"></a>
          </div>
        </div>
      @endforeach
    </div>

    <div class="d-flex justify-content-center mt-3">
      {{ $courses->links() }}
    </div>
  </div>

  @include('layouts.footer')
@endsection
