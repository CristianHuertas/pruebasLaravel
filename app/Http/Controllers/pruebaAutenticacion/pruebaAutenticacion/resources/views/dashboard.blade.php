<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pruebas Laravel') }}
        </h2>
    </x-slot>


    <div class="container">
        @yield('seccion')
    </div>

   
</x-app-layout>



