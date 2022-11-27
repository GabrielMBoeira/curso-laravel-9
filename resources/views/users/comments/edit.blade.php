@extends('layouts.app')

@section('title', "Editar Comentário de {$user->name}")

@include('includes.validations-form')

@section('content')
    <h1>Ediar Comentário para de {{ $user->name }}</h1>

    <form action="{{ route('comments.update', $comment->id) }}" method="post">
        @method('PUT')
        @include('users.comments._partials.form')
    </form>
@endsection
