@extends('layouts.app')

@section('title') Update Blog @endsection

@section('content')
<div class="container mt-4">
<form method="POST" action="{{ route('posts.update', [ 'post' => $post['id'] ]) }}">
   @method('patch')
   @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp" value="{{ $post['title'] }}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description"> {{ $post['description'] }} </textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select class="form-control" id="post_creator">
          <option>{{ $post['user']['name'] }}</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Update Post</button>
</form>
</div>
@endsection