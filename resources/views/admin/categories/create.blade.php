<x-app-layout>
<x-slot name="header_content">
        <h1>Nueva categoría</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Configuración</a></div>
            <div class="breadcrumb-item">Crear categoría</div>
		</div>
	</x-slot>

<div>
	<div class="md:grid md:grid-cols-3 md:gap-6">
		<div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Creación</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Estos son todos los datos que necesitas para crear una nueva categoría, 
                    puedes crear las categorías que consideres necesario, esto te ayudará a organizar tu inventario y 
                    mantener una correcta distribución del mismo.
                </p>
            </div>
		</div>
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="col-md-12">

                    @include('partials.error-messages')
                    <form method="POST" action="{{  route('admin.categories.store')}}">
                        {{ csrf_field() }} 
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input name="name"
                                value="{{ old('name') }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="url">Identificador / URL:</label>
                            <input name="url"
                                value="{{ old('url') }}"
                                class="form-control">
                                <span class="help-block">Si no deseas personalizar el URL, deja este campo sin diligenciar, 
                                    se generará automaticamente de acuerdo con el nombre de la categpría</span>
                        </div>
                        
                        <button class="btn btn-primary btn-block">Guardar categoría</button>
                    </form>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>