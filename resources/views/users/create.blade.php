@extends('layouts.app')

@section('title', 'Novo usuário')

@include('includes.validations-form')

@section('content')
    <h1>Novo usuário</h1>

    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @include('users._partials.form')
    </form>
@endsection
