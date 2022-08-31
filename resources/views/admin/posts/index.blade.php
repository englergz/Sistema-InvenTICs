<x-app-layout>
	<x-slot name="header_content">
        <h1>Listado de Productos</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Inventario</a></div>
            <div class="breadcrumb-item">Productos</div>
		</div>
	</x-slot>
	
	<div> 
		<livewire:table.main name="post" :model="$posts" />
    </div>
</x-app-layout>