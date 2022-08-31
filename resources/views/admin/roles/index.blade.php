
<x-app-layout>
	<x-slot name="header_content">
        <h1>Listado de roles</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Configuración</a></div>
            <div class="breadcrumb-item">Roles</div>
		</div>
	</x-slot>
	
	<div> 
		<livewire:table.main name="role" :model="$roles" />
    </div>
</x-app-layout>