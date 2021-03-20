@extends('layouts.app')

@section('title') {{ $post['title'] }} @endsection
<?php
use Carbon\Carbon;
?>

@section('content')
<div class="container">
<div class="card">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title">{{ $post['title'] }}</h5>
    <p class="card-text">{{ $post['description'] }}</p>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <p class="card-text">
        <b>Name:</b> {{ $post['user']['name'] }}
    </p>
    <p class="card-text">
        <b>Email:</b> {{ $post['user']['email'] }}
    </p>
    <p class="card-text">
        <b>Created at:</b> {{ Carbon::parse($post['created_at'])->format("g: i a l jS F Y") }}
    </p>
  </div>
</div>
</div>
@endsection