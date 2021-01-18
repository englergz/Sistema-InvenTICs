<x-app-layout>
	<x-slot name="header_content">
        <h1>Listado de publicaciones</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Publicaciones</a></div>
            <div class="breadcrumb-item">Blog</div>
		</div>
	</x-slot>
	
	<div> 
		<livewire:table.main name="post" :model="$post" />
    </div>
</x-app-layout>