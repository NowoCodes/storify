@extends('layouts.home')

@section('content')
  <div class="container">
    <div class="row justify-cotent-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Home Page

            <div class="float-right">
                <a href="{{ route('dashboard.index') }}">All</a>
                |
                <a href="{{ route('dashboard.index', ['type' => 'short']) }}">Short</a>
                |
                <a href="{{ route('dashboard.index', ['type' => 'long']) }}">Long</a>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Author</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($stories as $story)
                  <tr>
                    <td>{{ $story->title }}</td>
                    <td>{{ $story->type }}</td>
                    <td>{{ $story->user->name }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class="d-flex justify-content-end">
              {{ $stories->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
