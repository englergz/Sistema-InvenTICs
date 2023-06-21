@php
use App\Models\Employee;
use App\Models\Post;

$debtors = Employee::all();
$posts = Post::all();
@endphp
<div class="modal fade" id="myModalDebtor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="fixed z-10 inset-0 overflow-y-auto">
	<form method="POST" action="{{ route('admin.posts.store', '#debtor') }}">
	{{ csrf_field() }} 
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">

                <div class="col-md-12">
				@include('partials.error-messages')
                    <div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('post') ? 'has-error' : '' }}">
                        <label>Productos</label>
                        <select name="id" id="id" class="form-control">
                            <option value="" selected="true" disabled="disabled">Seleccione el dispositivo</option>
                            @foreach ($posts as $post)
                            <option value="{{ $post->id }}" {{ old('id', $post->id) ? ' selected' : '' }} 
                                data-employee_id="{{$post->employee_id}}" data-date="{{$post->employee_debtor_since}}">
                                {{$post->title.' '.$post->getTrademark->brand.' S/N# '.$post->serial}}
                            </option>
                            @endforeach
                        </select>
                        {!! $errors->first('id', '<span class="text-red-600">:message</span>') !!}
                    </div>
				</div>

			
				<div class="col-md-12">

						<div id="msj" style="display: none" class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
						<div class="flex">
							<div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
							<div>
							<p id="msj1" class="font-bold"></p>
							<p id="msj2" class="text-sm"></p>
							</div>
						</div>
						</div>
                    @if(!is_null($debtors))
						<div class="py-3 col-span-6 sm:col-span-3 form-group {{ $errors->has('employee') ? 'has-error' : '' }}">
							<label>Funcionario responsable</label>
							<select name="employee_id" id="employee_id" class="form-control select" >
								<option value="" selected="true" disabled="disabled">Seleccione el responsable del dispositivo</option>
								@foreach ($debtors as $employee)
								<option value="{{ $employee->id }}"{{ old('employee_id', $post->employee_id) == $employee->id ? 'selected' : '' }}>
								{{$employee->surname .' '.$employee->second_surname.' '.$employee->first_name.' '.$employee->second_name}}
								</option>
								@endforeach
							</select>
							{!! $errors->first('employee_id', '<span class="text-red-600">:message</span>') !!}
						</div>
                        @endif
					<div id="ocupado" class="bg-white-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
					<div class="grid grid-cols-6 gap-6">
						<div class=" col-span-6 sm:col-span-3 form-group">
						<label>Fecha de prestamo</label>
						<div class="input-group date">
							<input name="employee_debtor_since"
								class="form-control pull-right"
								value="{{  old('employee_debtor_since') }}"
								type="date"
								id="employee_debtor_since">
						</div>
						{!! $errors->first('employee_debtor_since', '<span class="text-red-600 help-block">:message</span>') !!}
						</div>
						  
						<div class="col-span-6 sm:col-span-3 form-group">
						<label>Hora de prestamo</label>
						<div class="input-group date">
							<input name="time"
								class="form-control pull-right"
								value="{{ old('time') }}"
								type="time"
								id="time">
						</div>
						{!! $errors->first('time', '<span class="text-red-600 help-block">:message</span>') !!}
						</div>
					</div>
					
					</div>

				</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="btn" class="btn btn-primary">Registrar préstamo</button>
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
		if ( window.location.hash === '#debtor') {
            $('#myModalDebtor').modal('show');
        }

        $('#myModalDebtor').on('hide.bs.modal', function(){
            window.location.hash = '';
        });

        $('#myModalDebtor').on('shown.bs.modal', function(){
            $('#id').focus();
            window.location.hash = '#debtor';
		});

		$(document).ready(function(){

			$('#id').val("").attr("selected" ,true);
			$('#employee_id').val("").attr("disabled", false);
			$('#btn').attr("disabled", true);

			$('#id').on('change', function(){

			var msj = document.getElementById('msj');
			var employee_id = $("option:selected",this).data('employee_id');

			if(employee_id){
				$('#employee_id').val(employee_id).attr("disabled", true);
				msj.style.display = 'block';
				$('#btn').attr("disabled", true);
				$(document.getElementById('msj1').innerHTML = "Dispositivo ocupado");
				$(document.getElementById('msj2').innerHTML = "El dispositivo aún se encuentra a cargo del funcionario");
				$('#ocupado').hide();

			}else{
				msj.style.display = 'none';
				$('#employee_id').val(employee_id).attr("disabled", false);
				$('#ocupado').show();
				$('#msj').hide();
				$('#btn').attr("disabled", false);
				
			}
			
			});
			
		});

		$(function () {
			$("p").click(function (e) {
				e.preventDefault();
				var post = $.parseJSON($(this).attr('id'));
				$("#id").val(post.id).attr("selected", true);
				$("#employee_debtor_since").val(moment().format("YYYY-MM-DD"));
				$("#time").val(moment().format("HH:mm"));
				$('#btn').attr("disabled", false);
			})
    	});
    	
	</script>
@endpush