@extends('layouts.app')

@section('title', 'Listagem do usuário')

@section('content')
    <h1>Lista dos usuários
        <a href=" {{ route('users.create')}} ">+</a>
    </h1>

    <form action="{{ route('users.index') }}" method="get">
        <input type="text" name="search" id="search">
        <button>Pesquisar</button>
    </form>

    <ul>
        @foreach ($users as $user)
            <li>
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
