@extends('layout')

@section('title', isset($user) ? 'Update '.$user->name : 'Create user')

@section('content')
    <a href="{{ route('users.index') }}">All users</a>

    <form
    @if(isset($user))
    action="{{ route('users.update', $user) }}"
    @else
    action="{{ route('users.store') }}"
    @endif
    method="post"
    >
    @isset($user)
    @method('PUT')
    @endisset
        @csrf
        <input type="text" placeholder="Name" name="name" value="{{ isset($user) ? $user->name : old('name') }}"> <br />
        @error("name")
            <p>{{$message}}</p>
        @enderror
        <input type="email" placeholder="Email" name="email" value="{{ isset($user) ? $user->email : old('email') }}"> <br />
        @error("email")
            <p>{{$message}}</p>
        @enderror

        @isset($user)
        <p>Change next fields only if you want to update your password. In other case just leave them empty.</p>
        <input type="password" placeholder="Confirm password" name="confirmPassword" /> <br />
        @error("confirmPassword")
            <p>{{$message}}</p>
        @enderror
        @endisset

        <input type="password" placeholder="New password" name="password"> <br />
        @error("password")
            <p>{{$message}}</p>
        @enderror
        <button type="submit">Submit</button>
    </form>
@endsection()
