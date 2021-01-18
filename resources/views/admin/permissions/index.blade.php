<x-app-layout>
	<x-slot name="header_content">
        <h1>Listado de permisos</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Institución</a></div>
            <div class="breadcrumb-item">permisos</div>
		</div>
	</x-slot>
	
	<div> 
		<livewire:table.main name="permission" :model="$permission" />
    </div>
</x-app-layout>