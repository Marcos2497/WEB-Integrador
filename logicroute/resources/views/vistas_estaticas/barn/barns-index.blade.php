@extends('dashboard')

@section('title', 'Gestión de Galpón')

@section('submenu', )
    <!-- Aquí puedes agregar el contenido del submenu -->
    <x-nav-link href="{{ route('barn-barns-index') }}" :active="request()->routeIs('barn-barns-*')">
        Galpón
    </x-nav-link>
    



@endsection

@section('content')
    @livewire('barns.barn-index')
@endsection