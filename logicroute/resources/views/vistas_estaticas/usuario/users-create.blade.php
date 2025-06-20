@extends('dashboard')

@section('title', 'Gestión de usuarios')

@section('submenu')

    <x-nav-link href="{{ route('users-users-index') }}" :active="request()->routeIs('users-users-*')">
        usuarios
    </x-nav-link>

    <x-nav-link href="{{ route('users-roles-index') }}" :active="request()->routeIs('users-roles-*')">
        roles
    </x-nav-link>


@endsection

@section('content')
    @livewire('users.users-create')
@endsection
