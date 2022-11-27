@extends('layouts.app')

@section('title', "Editar usuário $user->name")

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@section('content')
    <h1>Editar usuário {{ $user->name }}</h1>

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Digite seu nome..." value="{{ $user->name}}">
        <input type="email" name="email" placeholder="Digite seu e-mail..." value="{{ $user->email }}">
        <input type="password" name="password" placeholder="Digite sua senha">
        <button type="submit">Enviar</button>
    </form>
@endsection
