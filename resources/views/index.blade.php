@extends('layout')

@section('title', 'Users')

@section('content')
<a href="{{ route('users.create') }}">Create</a>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th>{{ $user->id }}</th>
            <td><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>
                <form method="POST" action="{{ route('users.destroy', $user) }}">
                    <a href="{{ route('users.edit', $user) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
