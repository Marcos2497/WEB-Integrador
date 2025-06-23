@extends('dashboard')

@section('title', 'Gestión de Galpones')

@section('submenu', )
    <!-- Aquí puedes agregar el contenido del submenu -->
    <x-nav-link href="{{ route('barn-barns-index') }}" :active="request()->routeIs('barn-barns-*')">
        Crear Galpón
    </x-nav-link>
    



@endsection

@section('content')
    @livewire('barns.barn-create')
@endsection