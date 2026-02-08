@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-2 tracking-tight">Welcome, {{ Auth::user()->name }}</h1>
    <p class="text-sm mb-8">Logged in as <span class="badge badge-primary">{{ Auth::user()->role->name }}</span></p>


@endsection
