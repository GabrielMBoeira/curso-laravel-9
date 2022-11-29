@extends('layouts.app')

@section('title', 'Listagem do usuário')

@section('content')
    <h1>Lista dos usuários
        <a href=" {{ route('users.create') }} ">+</a>
    </h1>

    <form action="{{ route('users.index') }}" method="get">
        <input type="text" name="search" id="search">
        <button>Pesquisar</button>
    </form>

    <ul>
        @foreach ($users as $user)
            <li>
                @if ($user->image)
                    <img src="{{ url("storage/{$user->image}") }}" alt="{{ $user->name }}" style="width: 20px">
                @else
                    <img src="{{ url("images/favicon.ico") }}" alt="{{ $user->name }}">
                @endif
                Nome: {{ $user->name }} - E-mail: {{ $user->email }}
                | <a href=" {{ route('users.edit', $user->id) }} ">Editar</a>
                | <a href=" {{ route('users.show', $user->id) }} ">Detalhes</a>
                | <a href=" {{ route('comments.index', $user->id) }} ">Comentários {{ $user->comments->count() }}</a>
            </li>
        @endforeach
    </ul>
@endsection

{{--
Paginação Laravel
<div> {{ $users->appends([
    'search' => request()->get('search', '')
])->links() }} </div> --}}
