@extends('layout.app')

@section('title')
    {{ $session->title }}
@endsection

@section('content')
    @include('sessions.form', ['action' => 'edit'])
@endsection
