@extends('layouts.app')

@section('title') Create Blog @endsection

@section('content')
<div class="container mt-4">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="title">Tags</label>
      <input name="tags" type="text" class="form-control" id="title" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control" id="description"> </textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator">
          @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-success">Create Post</button>
</form>
</div>
@endsection