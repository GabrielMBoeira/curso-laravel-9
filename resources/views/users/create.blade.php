@extends('layouts.app')

@section('title', 'Novo usuário')

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@section('content')
    <h1>Novo usuário</h1>

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Digite seu nome..." value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Digite seu e-mail..." value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Digite sua senha">
        <button type="submit">Enviar</button>
    </form>
@endsection
