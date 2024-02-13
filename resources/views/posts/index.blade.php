@extends('layouts.app')

@section('title') Blogsphere-Home @endsection

@section('content')



<div class="mt-4">
    <div class="text-center">
        <a href="{{route('posts.create')}}" class="btn btn-success" >Create post</a>
    </div>

    <table class="table table-striped">
    <thead>
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
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->user?$post->user->name: 'Not found' }}</td>
          <td>{{$post->created_at->format('y-m-d')}}</td>
        <td>
          <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">View</a>
          <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
          <form method="POST" style="display: InLine;" action="{{route('posts.destroy',$post['id'])}}"  onsubmit="return confirmDelete()">
          
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          
        </td>
      </tr>
    @endforeach
  </tbody>
    </table>
</div>

  <script>
      function confirmDelete() {
          var isConfirmed = confirm("Are you sure you want to delete?");
          return isConfirmed;
      }
  </script>

@endsection
    
