@extends('dashboard')

@section('title', 'Gestión de Alimentos')

@section('submenu', )
    <!-- Aquí puedes agregar el contenido del submenu -->
    <x-nav-link href="{{ route('food-foods-index') }}" :active="request()->routeIs('food-foods-*')">
        Alimentos
    </x-nav-link>


@endsection

@section('content')
    @livewire('foods.food-edit', ['id' => $id])
@endsection