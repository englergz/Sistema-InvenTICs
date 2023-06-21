<x-app-layout>
<x-slot name="header_content">
        <h1>Reportes</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Configuración</a></div>
            <div class="breadcrumb-item">Reportes</div>
		</div>
	</x-slot>

<div>
	<div class="md:grid md:grid-cols-3 md:gap-6">
		<div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Generar reportes</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Selecciona fecha de inicio y fecha final del reporte, 
                    sino especifica un producto, el reporte se hará de 
                    manera general.
                </p>
            </div>
		</div>
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                    <div class="col-md-12">
                    @include('partials.error-messages')
                    <form method="POST" action="{{  route('admin.posts.getReport')}}">
                        {{ csrf_field() }} 
                                <div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('post') ? 'has-error' : '' }}">
                                    <label>Productos</label>
                                    <select name="producto" id="producto" class="form-control">
                                        <option value="" selected="false">Todos</option>
                                        @foreach ($posts as $post)
                                        <option value="{{ $post->id }}" old('producto')>
                                            {{$post->title.' '.$post->getTrademark->brand.' S/N# '.$post->serial}}
                                        </option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('producto', '<span class="text-red-600">:message</span>') !!}
                                </div>

                            <div class="grid grid-cols-6 gap-6">
                                <div class=" col-span-6 sm:col-span-3 form-group">
                                <label>Fecha de inicio</label>
                                <div class="input-group date">
                                    <input name="date"
                                        class="form-control pull-right"
                                        value="{{  old('date') }}"
                                        type="date"
                                        id="date">
                                </div>
                                {!! $errors->first('date', '<span class="text-red-600 help-block">:message</span>') !!}
                                </div>
                                
                                <div class="col-span-6 sm:col-span-3 form-group">
                                <label>Fecha final</label>
                                <div class="input-group date">
                                    <input name="enddate"
                                        class="form-control pull-right"
                                        value="{{ old('enddate') }}"
                                        type="date"
                                        id="enddate">
                                </div>
                                {!! $errors->first('enddate', '<span class="text-red-600 help-block">:message</span>') !!}
                                </div>
                            </div>
                            <span class="py-3 help-block">
                            Si deseas un reporte de todos los productos, simplemente no especifiques (o no selecciones) uno, deja este campo sin diligenciar, 
                            se generará un reporte general de todos los productos del inventario.
                        </span>
                        
                        <button class="col-span-6 sm:col-span-3 form-group py-1 btn btn-primary btn-block">Generar reporte</button>
                        <a href="{{ route('dashboard') }}" class="button">
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