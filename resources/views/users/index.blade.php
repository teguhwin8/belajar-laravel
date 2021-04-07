    @extends('layouts.app')

    @section('content')
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">{{ __('Dashboard') }}</div>

              <div class="card-body">
                @if (session('status'))
                  <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                  </div>
                @endif

                {{ __('You are logged in!') }}

								{{-- User Blogs (One To Many) --}}
                <strong>Blog:</strong>
                <ul>
                  @foreach ($user->blogs as $blog)
                    <li>
                      <a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a>
                    </li>
                  @endforeach
                </ul>

								{{-- Users Courses (Many To Many) --}}
                <strong>Courses:</strong>
                <ul>
                  @foreach ($user->courses as $course)
                    <li>
                      <a href="/course/{{ $course->slug }}">{{ $course->title }}</a>
                    </li>
                  @endforeach
                </ul>

								{{-- User Socials (One To Many) --}}
                <strong>Sosial Media:</strong>
                <ul>
                  @foreach ($user->socials as $social)
                    <li>{{ $social->provider }} : {{ $social->username }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
