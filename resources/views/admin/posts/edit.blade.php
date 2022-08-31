<x-app-layout>
	<x-slot name="header_content">
        <h1>{{ __('Actualizar producto') }}</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Tablero</a></div>
            <div class="breadcrumb-item"><a href="#">Productos</a></div>
            <div class="breadcrumb-item"><a href="#">Actualizar producto</a></div>
        </div>
	</x-slot>

	<div>
	<div class="md:grid md:grid-cols-3 md:gap-6">
		<div class="md:col-span-1">
		<div class="px-4 sm:px-0">
			<h3 class="text-lg font-medium leading-6 text-gray-900">producto</h3>
			<p class="mt-1 text-sm text-gray-600">
				Estos son todos los datos que puedes modificar, actualiza la producto como crees que sea más conveniente
			</p>
		</div>
		</div>

    <div class="mb-4 md:mt-0 md:col-span-2">

			<form id="post-form" method="POST" action="{{ route('admin.posts.update', $post) }}">
			<div class="shadow sm:rounded-md sm:overflow-hidden">
          	<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
			{{ csrf_field() }} {{ method_field('PUT') }}

				<div class="col-md-12">
					<div class="grid grid-cols-6 gap-6">
						<div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
							<label>Marca</label>
							<select name="category_id" class="form-control select2">
								<option value="">Marca del producto</option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}"
											{{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
									>{{ $category->name }}</option>
								@endforeach
							</select>
							{!! $errors->first('category_id', '<span class="text-red-600">:message</span>') !!}
						</div>

						<div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('title') ? 'has-error' : '' }}">
							<label>Modelo</label>
							<input name="title"
								   class="form-control"
								   value="{{ old('title', $post->title) }}"
								   placeholder="Ingresa aquí el título de la producto">
							{!! $errors->first('title', '<span class="text-red-600">:message</span>') !!}
						</div>
			  		</div>
				</div>

			<div class="col-md-12">
				<div class=" form-group mt-1 {{ $errors->has('body') ? 'has-error' : '' }}">
					<label>Contenido producto</label>
					<textarea rows="10" class=" shadow-sm focus:ring-indigo-500 focus:border-green-900 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" 
					name="body" id="editor" placeholder="Ingresa el contendido completo de la producto">{{ old('body', $post->body) }}</textarea>
					{!! $errors->first('body', '<span class="text-red-600">:message</span>') !!}
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="">
					<div class="">
					<div class="grid grid-cols-6 gap-6">
						<div class="col-span-6 sm:col-span-3">
							<div class="form-group">
								<label>Fecha de producto</label>
								<div class="input-group date">
									<input name="published_at"
										class="form-control pull-right"
										value="{{  old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : $date) }}"
										type="date"
										id="datepicker">
								</div>
							</div>
              			</div>
						  <div class="col-span-6 sm:col-span-3">
							<div class="form-group">
								<label>Hora de producto</label>
								<div class="input-group date">
									<input name="time"
										class="form-control pull-right"
										value="{{ old('published_at', $post->published_at ? $post->published_at->format('H:i') : $time) }}"
										type="time"
										id="time">
								</div>
							</div>
              			</div>
			  		</div>

						<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
							<label>Categorías</label>
							<select name="category_id" class="form-control select2">
								<option value="">Seleciona una categoría</option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}"
											{{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
									>{{ $category->name }}</option>
								@endforeach
							</select>
							{!! $errors->first('category_id', '<span class="text-red-600">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
							<label>Etiquetas</label>
							<select name="tags[]" class="form-control select2"
									multiple="multiple"
									data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
								@foreach ($tags as $tag)
									<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
								@endforeach
							</select>
							{!! $errors->first('tags', '<span class="text-red-600">:message</span>') !!}
						</div>
						
									<div class="form-group">
									<label>Imagenes</label>
									<div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
										<div class="space-y-1 text-center">
										<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
											<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
										<div class="flex text-sm text-gray-600">
											<label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
											<span>Sube un archivo</span>
											<input id="file-upload" name="file-upload" type="file" class="sr-only">
											</label>
											<p class="pl-1">or drag and drop</p>
										</div>
										<p class="text-xs text-gray-500">
											PNG, JPG, hasta 10MB
										</p>
										</div>
									</div>
									</div>
								</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Guardar producto</button>
								<!--button type="submit" class="btn btn-danger btn-block">Eliminar producto</button-->
							</div>
					</div>
				</div>
			</div>
			</div>
    </div>
		</form>
  </div>
</div>
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
    CKEDITOR.config.height = 315;

    /*var myDropzone = new Dropzone('.dropzone', {
        url: '/admin/posts/{{ $post->url }}/photos',
        paramName: 'photo',
        acceptedFiles: 'image/*',
        maxFilesize: 2,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'
    });

    myDropzone.on('error', function(file, res){
        var msg = res.photo[0];
        $('.dz-error-message:last > span').text(msg);
    });

    Dropzone.autoDiscover = false;*/
</script>
@endpush
</x-app-layout>