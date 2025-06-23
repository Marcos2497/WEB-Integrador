@extends('dashboard')

@section('title', 'Gestión de Tipo de Alimento')

@section('submenu', )
    <!-- Aquí puedes agregar el contenido del submenu -->
    <x-nav-link href="{{ route('food-foods-index') }}" :active="request()->routeIs('food-foods-*')">
        Alimento
    </x-nav-link>

    <x-nav-link href="{{ route('food-tipos-index') }}" :active="request()->routeIs('food-tipos-*')">
        Tipo
    </x-nav-link>



@endsection

@section('content')
    <!-- Aquí puedes agregar el contenido de la vista -->

    @livewire('tipo.tipo-index')
@endsection