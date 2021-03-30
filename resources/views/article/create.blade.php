@extends('layouts.app')

@section('content')
  <h1>Buat Artikel Baru</h1>
	<form action="/article/post" method="post">
		<div class="mb-3">
			<label for="title" class="form-label">Judul Artikel</label>
			<input type="email" class="form-control" id="title" name="title">
		</div>
		<div class="mb-3">
			<label for="subject" class="form-label">Subject</label>
			<textarea class="form-control" id="subject" rows="5" name="subject"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
