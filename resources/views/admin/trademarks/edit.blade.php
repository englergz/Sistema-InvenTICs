<x-app-layout>
<x-slot name="header_content">
        <h1>Corregir marca </h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Configuración</a></div>
            <div class="breadcrumb-item">Corregir marca comercial</div>
		</div>
	</x-slot>

<div>
	<div class="md:grid md:grid-cols-3 md:gap-6">
		<div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Correción</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Estos son todos los datos para corregir esta marca comercial, 
                    puedes actualizar todos los campos que necesites.
                </p>
            </div>
		</div>
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="col-md-12">

                    @include('partials.error-messages')
                    <form method="POST" action="{{  route('admin.trademarks.update', $trademarks)}}">
                    {{ method_field('PUT') }} {{ csrf_field() }}
            
                        <div class=" grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="brand">Nombre</label>
                            <input type="text" name="brand" value="{{ old('brand', $trademarks->brand) }}" class="form-control">
                        </div>
                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="website">Sitio / pagina web</label>
                            <input type="text" name="website" value="{{ old('website', $trademarks->website) }}" class="form-control">
                        </div>
                        </div>

                        <div class=" grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3  form-group">
                            <label for="support">Contacto / Soporte técnico</label>
                            <input  type="text" name="support" value="{{ old('support', $trademarks->support) }}" class="form-control">
                        </div>
                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="nit">Nit</label>
                            <input  type="text" name="nit" value="{{ old('nit'. $trademarks->nit) }}" class="form-control">
                        </div>
                        </div>

                        
                        <button class="col-span-6 sm:col-span-3 form-group btn btn-primary btn-block">Guardar marca</button>
                        <a href="{{ route('admin.trademarks.index') }}" class="button">
							<button type="button"class="col-span-6 sm:col-span-3 form-group btn btn-secondary btn-block" >Cancelar</button>
							</a>
                    </form>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>