
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="fixed z-10 inset-0 overflow-y-auto">
	<form method="POST" action="{{ route('admin.posts.store', '#create') }}">
		{{ csrf_field() }}
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Título de tu nueva publicación</h4>
				</div>
				<div class="modal-body">
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						{{-- <label>Título de la publicación</label> --}}
						<input id="post-title" name="title"
						class="form-control"
						value="{{ old('title') }}"
						placeholder="Ingresa aquí el título de la publicación" autofocus required>
						{!! $errors->first('title', '<span class="text-red-600 help-block">:message</span>') !!}
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button class="btn btn-primary">Crear publicación</button>
				</div>
			</div>
		</div>
	</form>
	
</div>
</div>


@push('scripts')
	<script>
        if ( window.location.hash === '#create') {
            $('#myModal').modal('show');
        }

        $('#myModal').on('hide.bs.modal', function(){
            window.location.hash = '#';
        });

        $('#myModal').on('shown.bs.modal', function(){
            $('#post-title').focus();
            window.location.hash = '#create';
		});
	</script>
@endpush