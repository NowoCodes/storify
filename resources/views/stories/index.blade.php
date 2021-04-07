@extends('layouts.home')

@section('content')
  <div class="container">
    <div class="row justify-cotent-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Stories
            @can('create', App\Models\Story::class)

            <a href="{{ route('stories.create') }}" class="float-right">Add Story</a>
            @endcan
          </div>

          <div class="card-body">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($stories as $story)
                  <tr>
                    <td>{{ $story->title }}</td>
                    <td>{{ $story->type }}</td>
                    <td>{{ $story->status == 1 ? 'Yes' : 'No' }}</td>
                    <td>
                      <a href="{{ route('stories.show', [$story]) }}" class="btn btn-sm btn-secondary">View</a>

                      <a href="{{ route('stories.edit', [$story]) }}" class="btn btn-sm btn-secondary">Edit</a>

                      <form action="{{ route('stories.destroy', [$story]) }}" method="POST" class="d-inline-flex">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                      {{-- <a href="{{ route('stories.destroy', [$story]) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                    </td>
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
