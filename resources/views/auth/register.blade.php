@extends('layouts.app')

@section('title') Register @endsection

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


    <form method="POST" action="{{route('register')}}">
        @csrf

        <div class="mb-3">
            <label for="Full name" class="form-label">Full Name</label>
            <input name="full_name" type="text" class="form-control" value="{{old('full_name')}}" id="Full name" placeholder="Your full name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input name="email" type="email" class="form-control" value="{{old('email')}}" id="email" placeholder="Your email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input name="password" type="password" class="form-control" id="Full name" placeholder="Choose your password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password again:</label>
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Repeat your password">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign up</button>
        </div>

    </form>


@endsection
