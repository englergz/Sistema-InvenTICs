<x-app-layout>
	<x-slot name="header_content">
        <h1>Listado de categoría</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Configuración</a></div>
            <div class="breadcrumb-item">categoria</div>
		</div>
	</x-slot>
	
	<div> 
		<livewire:table.main name="category" :model="$category" />
    </div>
</x-app-layout>