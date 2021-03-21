@extends('layouts.app')

@section('title', 'Index Page')

@section('content')

<div class="container text-center my-3">
    <x-Button type="success" value="Create" id="" route="{{ route('posts.create') }}" />
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
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->user ? $post->user->name : 'Unkown User' }}</td>
      <td>{{ $post->created_at }}</td>
      <td>
        <x-Button type="info" value="View" id="{{ $post->id }}" route="{{ route('posts.show', [ 'post' => $post['id'] ]) }}" />
        <x-Button type="secondary" value="Edit" id="{{ $post->id }}" route="{{ route('posts.edit', [ 'post' => $post['id'] ]) }}" />
        <form method="POST" action="{{ route('posts.destroy', [ 'post' => $post['id'] ]) }}" style="display: inline;">
          @method('delete')
          @csrf
          <a class="btn btn-danger">Delete</a>
        </form>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaaal">
        View       
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModaaal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $post->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              {{ $post->description }}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
</div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
            {!! $posts->links() !!}
        </div>
</div>
<script>
const delBtns = Array.from(document.getElementsByClassName('btn btn-danger'));
delBtns.forEach(delBtn => {
  delBtn.addEventListener('click', async e => {

    console.log(e.path[1]);
    const postId = e.target.id;
    const res = confirm("Are you sure that you want to delete the post?");
    if (res) {
      e.path[1].submit();
    }
  
  });
});

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})


</script>
@endsection
