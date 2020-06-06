@extends('layout.app')

@section('title')
    Новая сессия
@endsection

@section('content')
    @include('sessions.form', ['action' => 'create'])
@endsection
