@php
use App\Models\Employee;

$debtors = Employee::all();
@endphp
<div class="modal fade" id="myModalEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="fixed z-10 inset-0 overflow-y-auto">
	<form method="POST" action="{{ route('admin.employees.store', '#') }}">
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
                    
				</div>
				<div class="col-md-12">
				<div id="ocupado" class="bg-white-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
					<div class="flex">
						<p class="font-bold">Busca quien hará la entrega del producto para registrar la devolución.</p>
		
					</div>
                    @if(!is_null($debtors))
						<div class="py-3 col-span-6 sm:col-span-3 form-group {{ $errors->has('employee') ? 'has-error' : '' }}">
							<label>Funcionario responsable</label>
							<select name="employee" id="employee" class="form-control select" >
								<option value="" selected="true" disabled="disabled">Seleccione el responsable del dispositivo</option>
								@foreach ($debtors as $employee)
								<option value="{{ $employee->id }}"{{ old('employee') == $employee->id ? 'selected' : '' }} data-posts="{{$employee->posts}}">
								{{$employee->surname .' '.$employee->second_surname.' '.$employee->first_name.' '.$employee->second_name}}
								</option>
								@endforeach
							</select>
							{!! $errors->first('employee', '<span class="text-red-600">:message</span>') !!}
						</div>
					@else
						<div class="flex">
							<div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
							<div>
							<p id="msj1" class="font-bold">No hay registro de empleados</p>
							<p id="msj2" class="text-sm">Verifica que hayas registrados los empleados</p>
							</div>
						</div>
                    @endif
						<div id="msjEmp" style="display: none"  class=" flex">
							<div class="py-1">
							<svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
							<div>
							<p id="msj1Emp" class="font-bold"></p>
							<p id="msj2Emp" class="text-sm"></p>
							</div>
						</div>
				</div>
				</div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="btnEmp" class="btn btn-primary">Buscar</button>
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
		if ( window.location.hash === '#employee') {
			
            $('#myModalEmployee').modal('show');
			
        }

        $('#myModalEmployee').on('hide.bs.modal', function(){
            window.location.hash = '';
        });

        $('#myModalEmployee').on('shown.bs.modal', function(){
            $('#employee_id').focus();
            window.location.hash = '#employee';
		});
		

		$(document).ready(function(){

			$('#btnEmp').attr("disabled", true);
			$('#employee').val("").attr("disabled", false);

			$('#employee').on('change', function(){

			var msjEmp = document.getElementById('msjEmp');
			var posts = $("option:selected",this).data('posts');
			
			if(!posts.length){
				msjEmp.style.display = 'block';
				
				$(document.getElementById('msj1Emp').innerHTML = "Empleado sin productos pendientes");
				$(document.getElementById('msj2Emp').innerHTML = "No tienen níngún producto del inventario a su responsabilidad");

			}else{
				msjEmp.style.display = 'block';
				$('#btnEmp').attr("disabled", true);
				$(document.getElementById('msj1Emp').innerHTML = "Empleado con "+posts.length+" productos");
				var p = "";

				posts.forEach(function(e){
					p = p + ("<br>"+" "+e.title);
				});

				$(document.getElementById('msj2Emp').innerHTML = p);
			
				$('#btnEmp').attr("disabled", false);
			}
			
			});
			
		});

	</script>
@endpush