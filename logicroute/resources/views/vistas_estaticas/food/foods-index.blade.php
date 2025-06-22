@extends('dashboard')

@section('title', 'Gestión de Alimento')

@section('submenu', )
    <!-- Aquí puedes agregar el contenido del submenu -->
    <x-nav-link href="{{ route('food-foods-index') }}" :active="request()->routeIs('food-foods-*')">
        Alimento
    </x-nav-link>




@endsection

@section('content')
    <!-- Aquí puedes agregar el contenido de la vista -->
    @livewire('foods.food-index')

@endsection