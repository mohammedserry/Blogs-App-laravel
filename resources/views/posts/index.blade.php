@extends('layouts.app')

@section('title') Index @endsection

@section('content')

<!-- Main Content -->
<div class="container mt-4">
  <div class="text-center mb-4">
    <a href="{{route('posts.create')}}" class="btn btn-success btn-lg animate__animated animate__fadeInUp">Create Post</a>
  </div>

  <!-- Table Card -->
  <div class="card animate__animated animate__fadeIn">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Posted By</th>
              <th scope="col">Created At</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{$post-> id}}</td>
              <td>{{$post-> title}}</td>
              <td>{{$post->user->name}}</td>
              <td>{{$post->created_at->format('d-M-Y')}}</td>
              <td>
                <a href="{{route('posts.show', $post-> id)}}" class="btn btn-info btn-sm">View</a>
                <a href="{{route('posts.edit', $post-> id)}}" class="btn btn-primary btn-sm">Edit</a>

                <form style="display: inline;" method="POST" action="{{route('posts.distroy', $post-> id)}}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection