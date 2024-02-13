@extends('layouts.app')

@section('title') Login @endsection

@section('content')

   @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



    <form method="POST" action="{{route('login')}}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input name="email" type="email" class="form-control" value="{{old('email')}}" id="email" placeholder="Your email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input name="password" type="password" class="form-control" id="Full name" placeholder="Choose your password">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

    </form>


@endsection
