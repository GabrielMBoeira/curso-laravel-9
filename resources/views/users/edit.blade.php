@extends('layouts.app')

@section('title', 'Editar usuário')

@include('includes.validations-form')

@section('content')
    <h1>Edigar usuário {{ $user->name }} </h1>

    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('users._partials.form')
    </form>
@endsection
