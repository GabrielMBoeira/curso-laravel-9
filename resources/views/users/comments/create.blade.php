@extends('layouts.app')

@section('title', "Novo Comentário para o usuário {$user->name}")

@include('includes.validations-form')

@section('content')
    <h1>Novo Comentário para o usuário {{ $user->name }}</h1>

    <form action="{{ route('comments.store', $user->id) }}" method="post">
        @include('users.comments._partials.form')
    </form>
@endsection
