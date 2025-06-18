@extends('dashboard')

@section('title', 'Gestión de usuarios')

@section('submenu')
    <!-- ir al dashboard -->
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        Dashboard
    </x-nav-link>



    <x-nav-link href="{{ route('users-roles-index') }}" :active="request()->routeIs('users-roles-*')">
        roles
    </x-nav-link>


@endsection

@section('content')
    @livewire('users.role-index')
@endsection
