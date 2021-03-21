@extends('layouts.app')

@section('title', 'Index Page')

@section('content')

<style>
.modal-container{
    /* display: none; */
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 100vw;
    background-color: rgba(0,0,0,0.3);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-items: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.5s ease-out;
}

.show{
    pointer-events: auto;
    opacity: 1;
}


.modal{
    background-color: white;
    margin: auto auto;
    height: 30%;
    padding: 3rem 5rem;
    border-radius: 1rem;
    box-shadow: 0.5rem 0.5rem 2rem rgba(0,0,0,0.2);
    text-align: center;
    z-index: 99;
    display: block;
    justify-self: center;
}

.modal p{
    font-size: 1.5rem;
    opacity: 0.7;
    margin-bottom: 1rem;
}



</style>
<div class="container text-center my-3">
    <x-Button type="success" value="Create" id="" route="{{ route('posts.create') }}" />
    <x-Button type="info" value="Restore Deleted" id="" route="{{ route('posts.restore') }}" />
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

        <!-- Modal -->
        <button id="modalBtn{{ $post->id }}" class="btn btn-primary modal-btn">View Modal</button>
        <div id="modal{{ $post->id }}" class="modal-container">
          <div class="modal">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->description }}</p>
            <button class="btn btn-secondary modal-close-btn">Close</button>
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

const modalBtns = Array.from(document.getElementsByClassName("modal-btn"));
modalBtns.forEach(btn => {
  btn.addEventListener('click', e => {
    e.target.parentElement.children[4].classList.add("show");
  })
})

const modalCloseBtns = Array.from(document.getElementsByClassName("modal-close-btn"));
modalCloseBtns.forEach(btn => {
  btn.addEventListener('click', e => {
    e.target.parentElement.parentElement.classList.remove("show");
  })
})
</script>
@endsection
