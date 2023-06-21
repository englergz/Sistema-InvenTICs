<x-app-layout>
	<x-slot name="header_content">
        <h1>Listado de marcas</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Configuración</a></div>
            <div class="breadcrumb-item">Marcas comerciales</div>
		</div>
	</x-slot>
	
	<div> 
		<livewire:table.main name="trademark" :model="$trademark" />
    </div>
</x-app-layout>