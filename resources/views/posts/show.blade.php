@extends('layouts.app')

@section('title') {{ $post['title'] }} @endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $post->title }}</h5>
      <p class="card-text">{{ $post->description }}</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      Post Creator Info
    </div>
    <div class="card-body">
      <p class="card-text">
          <b>Name:</b> {{ $post->user ? $post->user->name : 'Unknown User' }}
      </p>
      <p class="card-text">
          <b>Email:</b> {{ $post->user ? $post->user->email : '' }}
      </p>
      <p class="card-text">
          <b>Created at:</b> {{ $post->human_readable_date() }}
      </p>
    </div>
  </div>

  <div class="comments">
    
    <div class="card mt-3">
      <div class="card-header">
        <b>Comments</b>
      </div>
      <div class="card-body">
    @foreach($post->comment as $comment) 
        <p class="card-text">
        <b>{{ $comment->commentor_name}}:</b> {{ $comment->body }}
        </p>
    @endforeach
      </div>
    </div>
  </div>

  <form class="mt-5" method="POST" action="{{ route('comments.store') }}">
    @csrf
    <div class="form-group">
      <label for="description">Comment</label>
      <textarea name="comment" class="form-control" id="description"> </textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Commentor Name</label>
      <select name="user_name" class="form-control" id="post_creator">
          @foreach($users as $user)
            <option value="{{ $user->name }}">{{ $user->name }}</option>
          @endforeach
      </select>
    </div>
    <button name="post_id" type="submit" class="btn btn-success" value="{{ $post->id }}">Post a Comment</button>
</form>
</div>
@endsection