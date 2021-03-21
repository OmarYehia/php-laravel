@extends('layouts.app')

@section('title') Update Blog @endsection

@section('content')
<div class="container mt-4">
<form method="POST" action="{{ route('posts.update', [ 'post' => $post['id'] ]) }}">
   @method('patch')
   @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input name ="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" value="{{ $post->title }}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control" id="description"> {{ $post->description }} </textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator">
          @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-success">Update Post</button>
</form>
</div>
@endsection