@extends('layouts.app')

@section('title') Edit @endsection

@section('content')

    
    <form method="POST" action="{{route('posts.update',$post->id)}}">
        @csrf
        @method('PUT')

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
       @endif

       
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" value="{{$post->title}}" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3">{{$post->description}}</textarea>
        </div>

        <div class="mb-3">
            <label  class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                    <option value="{{$user->id}}">{{$user->name}}</option>
            </select>
        </div>


        <button class="btn btn-primary">Update</button>
    </form>


@endsection