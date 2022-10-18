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
        <input type="text" placeholder="Name" name="name" value="{{ isset($user) ? $user->name : null }}"> <br />
        <input type="email" placeholder="Email" name="email" value="{{ isset($user) ? $user->email : null }}"> <br />
        <input type="password" placeholder="Password" name="password"> <br />
        <button type="submit">Submit</button>
    </form>
@endsection()
