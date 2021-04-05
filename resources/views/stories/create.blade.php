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
              <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" id="title">
              </div>

              <div class="mb-3">
                <label for="body" class="form-label">Body:</label>
                <textarea class="form-control" name="body" id="body" rows="3"></textarea>
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Type:</label>
                <select class="form-control" name="type" id="type">
                  <option value="">-- Select --</option>
                  <option value="short">Short</option>
                  <option value="long">Long</option>
                </select>
              </div>

              <div class="mb-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="1">Yes
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="0">No
                  </label>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
