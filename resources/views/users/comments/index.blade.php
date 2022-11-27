@extends('layouts.app')

@section('title', "Comentários do usuário {$user->name}")

@section('content')
    <h1>Comentários do usuário {{ $user->name }}
        <a href=" {{ route('comments.create', $user->id)}} ">+</a>
    </h1>

    <form action="{{ route('comments.index', $user->id) }}" method="get">
        <input type="text" name="search" id="search">
        <button>Pesquisar</button>
    </form>

    <ul>
        @foreach ($comments as $comment)
            <li>
                Comentário: {{ $comment->body }} - Visível: {{ $comment->visible ? 'Sim':'Não' }}
                | <a href=" {{ route('comments.edit', ['user' => $user->id, 'id' => $comment->id]) }} ">Editar</a>
            </li>
        @endforeach
    </ul>
@endsection
