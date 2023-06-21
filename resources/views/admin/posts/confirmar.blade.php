@php
use App\Models\Post;

$posts = Post::all();
@endphp
<div class="modal fade" id="myModalConfirmar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="fixed z-10 inset-0 overflow-y-auto">
	<form method="POST" action="{{ route('admin.posts.store', '#') }}">
	{{ csrf_field() }} 
		<div class="modal-dialog" role="document"> 
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">
                @include('partials.error-messages')
                <div id="ocupado" class="bg-white-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
				<!--AQUI ESTA EL CAMPO OCULTO EN EL QUE VIAJARA LA ID-->
                    <div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('post') ? 'has-error' : '' }}">
                        <label>Devolución de producto</label>
                        <select style="display: none" name="confirmar_id" id="confirmar_id" class="form-control">
                        @foreach ($posts as $post)
                            <option value="{{$post->id}}" selected="true" {{ old('confirmar_id', $post->id) ? ' selected' : '' }} 
                                data-employee_id="{{$post->employee_id}}" data-date="{{$post->employee_debtor_since}}">
                                {{$post->title.' '.$post->getTrademark->brand.' S/N# '.$post->serial}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex">
							<div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
							<div>
							<p id="msjC1" class="font-bold">Se registrará que el producto ha sido devuelto al almacén</p>
							</div>
					</div>
                        
				</div>
                
                <div id="msj"  class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
						<div class="flex">
							<div>
							<p id="msj1" class="font-bold"></p>
							<p id="msj2" class="text-sm"></p>
							</div>
						</div>
				</div>

                <div class="py-4 col-span-6 sm:col-span-3 form-group {{ $errors->has('obs') ? 'has-error' : '' }}">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
                    <textarea id="obs" name="obs" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    placeholder="Escribe aquí tus observaciones al recibir el producto.." required></textarea>
                </div>
                {!! $errors->first('obs', '<span class="text-red-600">:message</span>') !!}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="btn" class="btn btn-primary">Confirmar</button>
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
<script>
        if ( window.location.hash === '#confirmar') {
            $('#myModalConfirmar').modal('show');
        }

        $('#myModalConfirmar').on('hide.bs.modal', function(){
            window.location.hash = '';
        });

        $('#myModalConfirmar').on('shown.bs.modal', function(){
            $('#id').focus();
            window.location.hash = '#confirmar';
		});
    
    $(function () {
        $("p").click(function (e) {
            e.preventDefault();
            var post = $.parseJSON($(this).attr('id'));
            console.log(post.employee_id);
            $("#confirmar_id").val(post.id).attr("selected", true);
            $("input[name=idConfirmar]").val(post.id);//Agrego la id al campo oculto que se va a enviar en el formulario
        })
    });

	</script>
@endpush