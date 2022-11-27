@extends('layouts.app')

@section('title', 'Listagem dos usuários')


@section('content')
    <h1>Listagem do usuário {{ $user->name }} </h1>

    <ul>
        <li> {{ $user->name }} </li>
        <li> {{ $user->email }} </li>
    </ul>
    <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button>Excluir</button>
    </form>
@endsection
