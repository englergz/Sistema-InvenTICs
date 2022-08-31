<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Lista de empleados') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Tablero</a></div>
            <div class="breadcrumb-item"><a href="#">Usuario</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.employees.index') }}">Lista de empleados</a></div>
        </div>
    </x-slot>

    <div> 
        <livewire:table.main name="employee" :model="$employees" />
    </div>
</x-app-layout>
