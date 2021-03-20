@extends('layouts.app')

@section('title', 'Index Page')

@section('content')

<div class="container text-center my-3">
    <x-Button type="success" value="Create" route="{{ route('posts.create') }}" />
</div>

<div class="container">

</div>
<div class="container">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted by</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
              @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $post['id'] }}</th>
      <td>{{ $post['Title'] }}</td>
      <td>{{ $post['User']['name'] }}</td>
      <td>{{ $post['Created_at'] }}</td>
      <td>
        <x-Button type="info" value="View" route="{{ route('posts.show', [ 'post' => $post['id'] ]) }}" />
        <x-Button type="secondary" value="Edit" route="{{ route('posts.edit', [ 'post' => $post['id'] ]) }}" />
        <x-Button type="danger" value="Delete" route="{{ route('posts.index') }}" />
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
