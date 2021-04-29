@extends('layouts.home')

@section('content')
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-bold display-3">Home Page</h1>
        <p class="lead text-muted">Great Stories from our Authors.</p>
        <p>
          <a href="{{ route('dashboard.index') }}" class="btn btn-primary my-2">All</a>
          <a href="{{ route('dashboard.index', ['type' => 'short']) }}" class="btn btn-secondary my-2">Short</a>
          <a href="{{ route('dashboard.index', ['type' => 'long']) }}" class="btn btn-secondary my-2">Long</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($stories as $story)

          <div class="col">
            <div class="card shadow-sm">
                <a href="{{ route('dashboard.show', [$story]) }}">
                    <img src="{{ $story->thumbnail }}" alt="Story Image" class="bd-placeholder-img card-img-top" width="100%" height="225">
                </a>

              <div class="card-body">
                <p class="card-text">{{ $story->title }}</p>

                @foreach ($story->tags as $tag)
                    <span class="badge rounded-pill bg-primary card-text mb-2">{{ $tag->name }}</span>
                @endforeach
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">{{ $story->user->name}}</button>
                  </div>
                  <small class="text-muted">{{ $story->type }}</small>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="d-flex justify-content-end mt-2">
        {{ $stories->withQueryString()->links() }}
      </div>
{{--      <x-alert message="This is First Component" />--}}
{{--      <hr>--}}
{{--      <x-alert message="This is Second Component" class="w-25 alert-danger"/>--}}
{{--      <hr>--}}
{{--      <x-alert message="This is Third Component" />--}}
{{--      <hr>--}}

    </div>
  </div>
  
  @endsection
