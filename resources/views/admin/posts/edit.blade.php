<x-app-layout>
	<x-slot name="header_content">
        <h1>{{ __('Actualizar producto') }}</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Tablero</a></div>
            <div class="breadcrumb-item"><a href="#">Productos</a></div>
            <div class="breadcrumb-item"><a href="#">Actualizar producto</a></div>
        </div>
	</x-slot>

	<div class="md:grid md:grid-cols-3 md:gap-6">
		<div class="md:col-span-1">
		<div class="px-4 sm:px-0">
			<h3 class="text-lg font-medium leading-6 text-gray-900">producto</h3>
			<p class="mt-1 text-sm text-gray-600">
				Estos son todos los datos que puedes modificar, actualiza el producto como crees que sea más conveniente
			</p>
		</div>
		</div>
		
   		<div class="mb-4 md:mt-0 md:col-span-2">
			
				<div class="row">
				@if ($post->photos->count())
					<div class="col-md-12">
						<div class="box box-primary">
							<div class="box-body">
								@foreach ($post->photos as $photo)
									<form method="POST" action="{{ route('admin.photos.destroy', $photo) }}"> 
										{{ method_field('DELETE') }} {{ csrf_field() }}
										<div class="col-md-2">
											<button class="btn btn-danger btn-xs" style="position: absolute">
												<i class="fa fa-remove"></i>
											</button>
											@if(pathinfo($photo->url, PATHINFO_EXTENSION) != 'pdf')
											
											<img class="py-1 img-responsive" src="{{ url('storage/'.$photo->url) }}" alt="{{ url($photo->url) }}">
											@else
												<p class="py-2"><a class ="btn btn-primary btn-block" href="{{ url('storage/'.$photo->url) }}" target="_blank">Archivo PDF Abrir</a>.</p>
											@endif
										</div>
									</form>
								@endforeach
							</div>
						</div>
					</div>
				@endif
				</div>
			<form id="post-form" method="POST" action="{{ route('admin.posts.update', $post) }}">
			<div class="shadow sm:rounded-md sm:overflow-hidden">
          	<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
			{{ csrf_field() }} {{ method_field('PUT') }}
			@include('partials.error-messages')
				<div class="col-md-12">
					<div class="grid grid-cols-6 gap-6">
					<div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('trademark') ? 'has-error' : '' }}">
						<label>Marca comercial</label>
						<select name="trademark_id" class="form-control select">
							<option value="" selected="true" disabled="disabled">Seleciona la marca comercial</option>
							@foreach ($trademarks as $trademark)
							<option value="{{ $trademark->id }}"{{ old('trademark_id', $post->trademark_id) == $trademark->id ? 'selected' : '' }}>
								{{ $trademark->brand }}
							</option>
							@endforeach
						</select>
						{!! $errors->first('trademark', '<span class="text-red-600">:message</span>') !!}
					</div>

					<div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						<label>Modelo</label>
						<input name="title"
								class="form-control"
								value="{{ old('title', $post->title) }}"
								placeholder="Ingresa aquí el título de la producto">
						{!! $errors->first('title', '<span class="text-red-600">:message</span>') !!}
					</div>
			  		

					<div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('serial') ? 'has-error' : '' }}">
						<label>No. Serial</label> 
						<input id="serial" name="serial"
						class="form-control"
						value="{{ old('serial', $post->serial) }}"
						placeholder="S/No.# "  required>
						{!! $errors->first('serial', '<span class="text-red-600 help-block">:message</span>') !!}
					</div>
					<div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
						<label>Categorías</label>
						<select name="category_id" class="form-control select">
							<option value="" selected="true" disabled="disabled">Seleciona una categoría</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}"
										{{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
								>{{ $category->name }}</option>
							@endforeach
						</select>
						{!! $errors->first('category_id', '<span class="text-red-600">:message</span>') !!}
					</div>
					<div class=" col-span-6 sm:col-span-3 form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
						<label>Etiquetas</label>
						<select name="tags[]" class="form-control select2"
								multiple="multiple"
								data-placeholder="Selecciona una o más etiquetas" style="width: 100%; high: 100%">
							@foreach ($tags as $tag)
								<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
							@endforeach
						</select>
						{!! $errors->first('tags', '<span class="text-red-600">:message</span>') !!}
					</div>
					<div class="col-span-6 sm:col-span-3 form-group">
						<label>Fecha de producto</label>
						<div class="input-group date">
							<input name="published_at"
								class="form-control pull-right"
								value="{{  old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : $date) }}"
								type="date"
								id="datepicker"  disabled>
						</div>
					</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class=" form-group mt-1 {{ $errors->has('body') ? 'has-error' : '' }}">
						<label>Descripción del producto</label>
						<textarea rows="10" class=" shadow-sm focus:ring-indigo-500 focus:border-green-900 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" 
						name="body" id="editor" placeholder="Ingresa el contendido completo del producto" >{{ old('body', $post->body) }}</textarea>
						{!! $errors->first('body', '<span class="text-red-600">:message</span>') !!}
					</div>
				</div>
			
				<div class="col-md-12">
					@if($post->employeeDebtor)
						<div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('employee') ? 'has-error' : '' }}">
							<label>Funcionario responsable</label>

							<a href="{{ route('admin.employees.show', $post->employeeDebtor) }}">
								<span class=" px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800" >
								Ocupado by 
									{{$post->employeeDebtor->first_name .' '.$post->employeeDebtor->surname}}
								</span>
							</a>

							<select name="employee_id" class="form-control select" disabled><!--autofocus-->
								<option value="">Selecione el responsable del dispositivo</option>
								@foreach ($employees as $employee)
								<option value="{{ $employee->id }}"{{ old('employee_id', $post->employee_id) == $employee->id ? 'selected' : '' }}>
								{{$employee->surname .' '.$employee->second_surname.' '.$employee->first_name.' '.$employee->second_name}}
								</option>
								@endforeach
							</select>
							{!! $errors->first('employee', '<span class="text-red-600">:message</span>') !!}
						</div>
						
					<div class="grid grid-cols-6 gap-6"> 
						
						<div class=" col-span-6 sm:col-span-3 form-group">
						<label>Fecha de prestamo</label>
						<div class="input-group date">
							<input name="employee_debtor_since"
								class="form-control pull-right"
								value="{{  old('employee_debtor_since', $post->employee_debtor_since ? $post->employee_debtor_since->format('Y-m-d') : ' ') }}"
								type="date"
								id="datepicker" disabled>
						</div>
						</div>
						  
						<div class="col-span-6 sm:col-span-3 form-group">
						<label>Hora de prestamo</label>
						<div class="input-group date">
							<input name="time"
								class="form-control pull-right"
								value="{{ old('time', $post->employee_debtor_since ? $post->employee_debtor_since->format('H:i') : ' ') }}"
								type="time"
								id="time" disabled="disabled">
						</div>
						</div>
						@endif
					</div>
					<div class="form-group ">
						<label>Imagenes y PDFs</label>
						<div class=" flex justify-center px-6 pt-5 pb-6 border-gray-300 border-dashed rounded-md">
							<div class="space-y-1 text-center">
								<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
									<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
								<div class="flex text-sm text-gray-600">
									<label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
									</label>	
									<div class="col-md-12 flex justify-center rounded-md dropzone">
									
									</div>
									
								</div>
								<p class="text-xs text-gray-500">PDF, PNG, JPG, hasta 10MB</p>
							</div>
						</div>
						
						
					</div>
					<div class="form-group">
							<button type="submit" class="col-span-6 sm:col-span-3 form-group btn btn-primary btn-block">Guardar producto</button>
							<!--button type="submit" class="btn btn-danger btn-block">Eliminar producto</button-->
							<a href="{{ route('admin.posts.index') }}" class="button">
							<button type="button"class="col-span-6 sm:col-span-3 form-group btn btn-secondary btn-block" >Cancelar</button>
							</a>
							

					</div>
				</div>
			</div>
			</div>
			</form>
			
    	</div>
  </div>

@push('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>

    CKEDITOR.replace('editor');
    CKEDITOR.config.height = 215;


	var myDropzone = new Dropzone('.dropzone', {
        url: '/posts/{{ $post->url }}/photos',
        paramName: 'photo',
        acceptedFiles: 'image/jpeg,image/png,image/jpg,application/pdf',
        maxFilesize: 10,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        dictDefaultMessage: '<p class="text-ms text-gray-500">Arrastre aquí los archivos para subirlos</p>'
    });

    myDropzone.on('error', function(file, res){
        var msg = res.photo[0];
        $('.dz-error-message:last > span').text(msg);
    });

	

    Dropzone.autoDiscover = false;

</script>
@endpush
</x-app-layout>