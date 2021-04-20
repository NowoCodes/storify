@extends('layouts.home')

@section('content')
  <div class="container">
    <div class="row justify-cotent-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Deleted Stories
          </div>

          <div class="card-body">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Type</th>
                  <th>User</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($stories as $story)
                  <tr>
                    <td>{{ $story->title }}</td>
                    <td>{{ $story->type }}</td>
                    <td>{{ $story->user->name }}</td>
                    <td>
                      <form action="{{ route('admin.stories.restore', [$story]) }}" method="POST" class="d-inline-flex">
                        @csrf
                        @method('PUT')

                        <button class="btn btn-sm btn-danger">Restore</button>
                      </form>

                      <form action="{{ route('admin.stories.delete', [$story]) }}" method="POST" class="d-inline-flex">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">Delete</button>
                      </form>
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
