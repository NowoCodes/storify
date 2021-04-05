@extends('layouts.home')

@section('content')
  <div class="container">
    <div class="row justify-cotent-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">{{ $story->title }}</div>

          <div class="card-body">
              {{ $story->body }}

              <p class="fw-bold">
                  Status: {{ $story->status == 1 ? 'Yes' : 'No' }}
                  Type: {{ $story->type }}
              </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
