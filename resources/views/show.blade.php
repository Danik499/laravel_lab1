@extends('layout')

@section('title', $user->name)

@section('content')
    <p>ID: {{$user->id}}</p>
    <p>Name: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>
    <p>Created at: {{date("d/m/Y", strtotime($user->created_at))}}</p>
    <p>Last updated at: {{date("d/m/Y", strtotime($user->updated_at))}}</p>

    <a href="{{ route('users.index') }}">Back</a>
@endsection
