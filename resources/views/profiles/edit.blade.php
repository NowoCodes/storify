@extends('layouts.home')

@section('content')
  <div class="container">
    <div class="row justify-cotent-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Edit Profile
          </div>

          <div class="card-body">
            <form action="{{ route('profiles.update', [$user]) }}" method="POST">
              @csrf
              @method('PUT')

              @if ($message = Session::get('error'))
                  <div class="alert alert-danger alert-dismissible">
                      <p>{{ $message }}</p>
                  </div>
              @endif

              <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                  value="{{ old('name', $user->name) }}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email"
                  value="{{ $user->email }}" readonly>
              </div>

              <div class="mb-3">
                <label for="biography" class="form-label">Biography:</label>
                <textarea class="form-control @error('biography') is-invalid @enderror" name="biography" id="biography" rows="3"">{{ old('biography', $user->profile->biography ?? '') }}</textarea>
                @error('biography')
                    <span class=" invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                  value="{{ old('address', $user->profile->address ?? '') }}">
                @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
