@extends('layouts.app')

@section('title') Edit @endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="POST" action="{{route('posts.update', $post-> id)}}">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input value="{{$post-> title}}" name="title" type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{$post-> description}}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Post Creator</label>
    <select name="post_creator" class="form-control">
      @foreach($users as $user)
      <option value="{{$user-> id}}">{{$post->user->name}}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-success">Update</button>
</form>

@endsection