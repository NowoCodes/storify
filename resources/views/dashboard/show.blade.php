@extends('layouts.home')

@section('content')
  <div class="container">
    <div class="row justify-cotent-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            {{ $story->title }} by {{ $story->user->name }}

            <a class="float-right" href="{{ route('dashboard.index') }}">Back</a>
          </div>

          <div class="card-body">
            {{ $story->body }}

            <p class="fst-italic fw-bold">{{ $story->footnote }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
