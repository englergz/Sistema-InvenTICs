@php
use Carbon\Carbon;
@endphp
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
	<!--div class="flex flex-col">
   
		<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
			<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
			<table class="min-w-full divide-y divide-gray-200"-->
            <x-data-table :data="$data" :model="$posts">
				<!--thead class="bg-gray-50"-->
                <x-slot name="head"> 
					<tr>
						<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
						<a wire:click.prevent="sortBy('user_id')" role="button" href="#">
							Marca, modelo y S/N#.
							@include('components.sort-icon', ['field' => 'owner->name'])
						</a></th>
						
						<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
						<a wire:click.prevent="sortBy('category_id')" role="button" href="#">
							Categoría y Etiquetas
							@include('components.sort-icon', ['field' => 'category->name'])
						</a></th>
						<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
						<a wire:click.prevent="sortBy('employee_id')" role="button" href="#">
							Estado del producto
							@include('components.sort-icon', ['field' => 'post->employeeDebtor'])
						</a></th>
						<th>...</th>
                    </tr>
                </x-slot>
				<x-slot name="body">
                <!--/thead-->
          		<!--tbody class="bg-white divide-y divide-gray-200"-->
				@foreach ($posts as $post)
				@can('view', $post)
				<tr x-data="window.__controller.dataTableController({{ $post->id }})">
					<td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
						<div class="flex-shrink-0 h-10 w-10">
							<img class="h-10 w-10 rounded-full" src="{{ $post->owner->profile_photo_url}}" alt="{{ $post->owner->name}}">
						</div>
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
								{{$post->title}}
							</div>
							<div class="inline-flex text-xs leading-5 font-semibold rounded-full text-gray-500">
								{{ $post->getTrademark->brand }}
							</div>
							<div class="text-sm text-gray-500">
								S/N#{{' '.$post->serial}}
							</div>
						</div>
						</div>
					</td>
					<td class="px-6 py-4 whitespace-nowrap">
						<span class="">
							<a class= " px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800" 
							href="{{ route('categories.show', $post->category) }}" target="_blank">{{ $post->category->name }}</a>
						</span>
						<div class="text-sm text-gray-500">@include('posts.tags')</div>
					</td>
					<td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
						@if($post->employee_debtor_since)
							@if($post->employee_debtor_since > Carbon::now() )
								¡Se entregará
								<span class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-blue-100">
								{{ $post->employee_debtor_since->diffforHumans() }}!</span>
							@else Última fecha asignada.<br>
								{{ $post->employee_debtor_since->format('d M Y H:i A') }}
							@endif
						@else
							Nunca ha sido préstado,
							
						@endif
						<br>
						@if( !$post->employeeDebtor )
						
						<span class="px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800" >Disponible
						</span>
						<br>
						<span >
							<p href="#" data-toggle="modal" data-target="#myModalDebtor" id="{{ $post }}" 
								class="btn px-2 inline-flex leading-5 font-semibold rounded-full bg-blue-100 text-xs text-gray-500">
                            	<strong>¿Asignar ahora?</strong>
							</p>
						</span>
						@else
						<a href="{{ route('admin.employees.show', $post->employeeDebtor) }}">
						<span class=" px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800" >
						Ocupado by 
						{{$post->employeeDebtor->first_name .' '.$post->employeeDebtor->surname}}
						</span></a>

						@endif
					</td>
					<td class="whitespace-no-wrap row-action--icon">
						@can('view', $post)
							<a role="button" href="{{ route('posts.show', $post) }}" class="mr-3" target="_blank"><i class="fa fa-16px fa-eye"></i></a>
							<a role="button" id="file" href="{{ route('admin.posts.productopdf', ['post' => $post] ) }}" class="mr-3" target="_blank"><i class="fa fa-16px fa-file-pdf-o"></i></a>
						@endcan
						@can('update', $post)
							<a role="button" href="{{ route('admin.posts.edit', $post) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
						@endcan
						@can('delete', $post)
						@if( !$post->employeeDebtor )
							<a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
							{{ csrf_field() }} {{ method_field('DELETE') }}   
								
                         @endif
						@endcan
                    </td>
            	</tr>
				<!-- Más items... -->
				@endcan
                @endforeach
                </x-slot>
				  <!--/tbody-->
            </x-data-table>
            <!--/table>
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
               
                {{ $posts->onEachSide(1)->links() }}
            </div>
         </div>
         
    </div>        
</div>
</div-->
</div>

<script>
	$("#file").click(function(){
		var posts = NULL;
		var post = NULL;
		$.ajax({
			type: "GET",
			url: 'admin.posts.productopdf',
			success:function(data) {
			}
		})
	});
</script>