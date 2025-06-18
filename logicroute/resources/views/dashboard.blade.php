<x-app-layout>
    <x-slot name="header"> <!-- Este sería el submenu de la navegacion que se este realizando-->    
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')   
        </h2>
        <nav class= "flex" >
            @yield('submenu')
        </nav>
    </x-slot>
    <!-- Esto esta debajo del submenu pero que regleja lo seleccionado en el submenu -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
            @if (request()->routeIs('dashboard'))
                <div class="alert alert-success">
                    La verdad es que no se si esto funciona
                </div>
            @endif
    </div>
</x-app-layout>

