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
            <img src="{{ $story->thumbnail }}" alt="Story Image" class="bd-placeholder-img card-img-top" width="100%"
              height="225">

            {{-- <p class="fst-italic fw-bold">{{ $story->footnote }}</p> --}}
            <p class="card-text">{{ $story->body }}</p>
            @foreach ($story->tags as $tag)
              <span class="badge rounded-pill bg-primary card-text mb-2">{{ $tag->name }}</span>
            @endforeach
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">{{ $story->user->name }}</button>
              </div>
              <small class="text-muted">{{ $story->type }}</small>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
