@php
use App\Models\Tag;
use App\Models\Category;
use App\Models\Trademark;

$tags = Tag::all();
$categories = Category::all();
$trademarks = Trademark::all();
@endphp
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="fixed z-10 inset-0 overflow-y-auto">
	<form method="POST" action="{{ route('admin.posts.store', '#create') }}">
		{{ csrf_field() }}
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">
				@include('partials.error-messages')
					<div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('trademark') ? 'has-error' : '' }}">
						<label>Marca comercial</label>
						<select name="trademark_id" class="form-control select">
							<option value="">Seleciona la marca comercial</option>
							@foreach ($trademarks as $trademark)
							<option value="{{ $trademark->id }}"
										{{ $trademark->id ? 'selected' : '' }}
								>{{ $trademark->brand }}</option>
							@endforeach
						</select>
						{!! $errors->first('trademark', '<span class="text-red-600">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						<label>Modelo</label> 
						<input id="post-title" name="title"
						class="form-control"
						value="{{ old('title') }}"
						placeholder="Ingresa aquí el modelo" autofocus required>
						{!! $errors->first('title', '<span class="text-red-600 help-block">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('serial') ? 'has-error' : '' }}">
						 <label>Serial</label> 
						<input id="post-serial" name="serial"
						class="form-control"
						value="{{ old('serial') }}"
						placeholder="S/No.# " autofocus required>
						{!! $errors->first('serial', '<span class="text-red-600 help-block">:message</span>') !!}
					</div>

					<div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('category') ? 'has-error' : '' }}">
						<label>Categoría</label>
						<select name="category_id" class="form-control select">
							<option value="">Seleciona la categoría</option>
							@foreach ($categories as $category)
							<option value="{{ $category->id }}"
										{{ $category->id ? 'selected' : '' }}
								>{{ $category->name }}</option>
							@endforeach
						</select>
						{!! $errors->first('category', '<span class="text-red-600">:message</span>') !!}
					</div>

						<div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
							<label>Etiquetas</label>
							<select name="tags[]" class="form-control select2"
									multiple="multiple"
									data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
								@foreach ($tags as $tag)
									<option {{ collect(old('tags' ))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
								@endforeach
							</select>
							{!! $errors->first('tags', '<span class="text-red-600">:message</span>') !!}
						</div>

						<div class="">
							<div class=" form-group mt-1 {{ $errors->has('body') ? 'has-error' : '' }}">
								<label>Características y descripción del dispositivo</label>
								<textarea rows="10" class=" shadow-sm focus:ring-indigo-500 focus:border-green-900 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" 
								name="body" id="editor" placeholder="Ingresa el contendido completo del producto">{{ old('body') }}</textarea>
								{!! $errors->first('body', '<span class="text-red-600">:message</span>') !!}
							</div>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button class="btn btn-primary">Crear producto</button>
				</div>
			</div>
		</div>
	</form>
	
</div>
</div>


@push('scripts')
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
	<script>
        if ( window.location.hash === '#create') {
            $('#myModal1').modal('show');
        }

        $('#myModal1').on('hide.bs.modal', function(){
            window.location.hash = '#';
        });

        $('#myModal1').on('shown.bs.modal', function(){
            $('#post-title').focus();
            window.location.hash = '#create';
		});

		CKEDITOR.replace('editor');
    	CKEDITOR.config.height = 180;//315
	</script>

@endpush