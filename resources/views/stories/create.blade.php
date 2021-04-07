@extends('layouts.home')

@section('content')
  <div class="container">
    <div class="row justify-cotent-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Add Story

            <a class="float-right" href="{{ route('stories.index') }}">Back</a>
          </div>

          <div class="card-body">
            <form action="{{ route('stories.store') }}" method="POST">
              @csrf

              @include('stories.form')
              <button type="submit" class="btn btn-primary">Add</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection