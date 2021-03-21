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
</div>
@endsection