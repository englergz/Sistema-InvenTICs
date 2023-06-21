@php
use Carbon\Carbon;
@endphp
<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Tablero</a></div>
            <div class="breadcrumb-item">Home</div>
        </div>
    </x-slot>

      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
        <!-- Content -->
          <div class="mt-2">
            <!-- State cards -->
              <div class="grid grid-cols-1 gap-8 p-3 lg:grid-cols-1 xl:grid-cols-3">

                <!-- Employee card -->             
                <div class="flex items-center justify-between p-3 bg-transparent border-slate-900  rounded-md dark:bg-darker">
                  <div>
                    <div>
                      <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                      </span>
                    </div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">EMPLEADOS</h6>
                    <span class="text-xl font-semibold">{{ $employees }} / {{ $employees_count }}</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md leading-none tracking-wider ">
                    +{{ number_format($employees_count/$employees*100,2) }}%
                    </span>
                    <span class="text-xs leading-none tracking-wider text-gray-500 uppercase font-semibold">Que tienen productos en calidad de préstamo.</span>     
                  </div>        
                </div>

                <!-- Category card -->
                <div class="flex items-center justify-between p-3 bg-transparent border-slate-900  rounded-md dark:bg-darker">
                  <div>
                    <div>
                      <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                      </span>
                    </div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">Categorías</h6>
                    <span class="text-xl font-semibold"> {{ $categories->COUNT() }} / {{ $categories_count }}</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +{{ number_format($categories_count/$categories->COUNT()*100,2) }}%
                    </span>
                    <span class="text-xs leading-none tracking-wider text-gray-500 uppercase font-semibold">en uso de productos categorizado</span>
                  </div>
                </div>

                <!-- Tag card -->
                <div class="flex items-center justify-between p-3 bg-transparent border-slate-900  rounded-md dark:bg-darker">
                  <div>
                    <div>
                      <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round"stroke-linejoin="round" stroke-width="2"d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                      </span>
                    </div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"> ETIQUETAS </h6>
                    <span class="text-xl font-semibold"> {{ $tags }} / {{ $tags_count }}</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    +{{ number_format($tags_count/$tags*100,2) }}%
                    </span>
                    <span class="text-xs leading-none tracking-wider text-gray-500 uppercase font-semibold">en uso con respecto a productos etiquetados.</span>
                  </div>
                </div>
                
              </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                  <!-- Stock chart card -->
                      <div class="col-span-2 bg-transparent border-slate-900  rounded-md dark:bg-darker">

                          <!-- Card header -->
                                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                                  <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Stock / Disponibles</h4>
                                      <div class="flex items-center space-x-2">
                                          <span class="text-sm font-semibold text-gray-500 dark:text-light"> {{ $stock->COUNT()}}</span>
                                      </div>
                                </div>
                          <!-- Chart -->
                          <div class="row">
                          <div class="table-responsive">
                            <table class="table table-striped text-gray-600  overflow-hidden sm:rounded-lg">
                                <tbody>
                                @foreach ($stock as $post)
                                @if( !$post->employeeDebtor )
                                    <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      
                                      
                                      <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                          {{$post->title}}
                                        </div>
                                        
                                        <div class="text-sm text-gray-500">
                                          S/N#{{' '.$post->serial}}
                                        </div>
                                      </div>
                                      </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="inline-flex text-xs leading-5 font-semibold rounded-full text-gray-500">
                                          {{ $post->getTrademark->brand }}
                                        </div>
                                      <span class="">
                                        <a class= " px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800" 
                                        href="{{ route('categories.show', $post->category) }}" target="_blank">{{ $post->category->name }}</a>
                                      </span>
                                      <div class="text-sm text-gray-500">@include('posts.tags')</div>
                                    </td>
                                    <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                      @can('update', $post)
                                      <span class=" ">
                                        <p href="#" data-toggle="modal" data-target="#myModalDebtor" id="{{ $post }}" 
                                          class="btn px-2 inline-flex leading-5 font-semibold rounded-full bg-blue-100 text-xs text-gray-500">
                                                        <strong>¿Asignar ahora?</strong>
                                        </p>
                                      </span>
                                      @endcan
                                    </td>
                                    <td class="whitespace-no-wrap row-action--icon">
                                      @can('view', $post)
                                        <a role="button" href="{{ route('posts.show', $post) }}" class="mr-3" target="_blank"><i class="fa fa-16px fa-eye"></i></a>
                                      @endcan
                                      </td>
                                    </tr>
                                  @endif
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                  <!--Category chart card -->
                      <div class="bg-transparent border-slate-900  rounded-md dark:bg-darker">
                          <!-- Card header -->
                            <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                              <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Productos por categorías / Cantidad </h4>
                                <div class="flex items-center space-x-2">
                                  <span class="text-sm text-gray-500 dark:text-light"></span>
                                </div>
                            </div>
                          <!-- Chart -->
                          <div class="row">
                          <div class="table-responsive">
                            <table class="">
                                <tbody>
                                  @foreach ($categories as $category)
                                  @if($category->posts->COUNT())
                                    <tr>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                    
                                          <a class= " px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800" 
                                          href="{{ route('categories.show', $category->url) }}" target="_blank">{{ $category->name }}</a>                    
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 text-right leading-5 font-semibold">{{'  '.$category->posts->COUNT() }} producto(s)</span>
                                      </td>
                                    </tr>
                                  @endif
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                </div>



              <!--User chart card -->
              <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                    <div class="bg-transparent border-slate-900  rounded-md dark:bg-darker" >
                      <!-- Card header -->
                          <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                                <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Últimos usuarios registrados</h4>
                                <div class="flex items-center space-x-2">
                                  <span class="text-sm text-gray-500 dark:text-light">Pertene a</span>
                                </div>
                          </div>

                        <div class="row">
                          <div class="table-responsive">
                            <table class="">
                                <tbody>
                                  @foreach ($authors as $author)
                                      <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="flex items-center">
                                          <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $author->profile_photo_url}}" alt="{{ $author->name}}">
                                          </div>
                                            <div class="ml-4">
                                              <div class="text-sm font-medium text-gray-900">
                                                {{ $author->name }} 
                                              </div>
                                                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                      <a href="#">{{$author->getRoleDisplayNames()}}</a>
                                                  </span>
                                            </div>
                                            </div>
                                          </td>
                                          <td>{{$author->employee->first_name.' '.$author->employee->second_name.' '.
                                            $author->employee->surname .' '.$author->employee->second_surname}}
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-blue-800">
                                                      <a href="#">{{$author->employee->position}}</a>
                                                  </span>
                                          </td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                <!-- Post chart card -->
                  <div class="bg-transparent border-slate-900  rounded-md dark:bg-darker" >
                    <!-- Card header -->
                        <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                              <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Últimas productos registrados</h4>
                        </div>
                      <!-- Chart -->
                          
                          <div class="row">
                          <div class="table-responsive">
                            <table class="">
                                <tbody>
                                  @foreach ($posts as $post)
                                      <tr>
                                          <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                  {{$post->title}}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                  S/N#{{' '.$post->serial}}
                                                </div>
                                              </div>
                                            </td>
                                          <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                             
                                            <div class="inline-flex text-xs leading-5 font-semibold rounded-full text-gray-500">
                                                  {{ $post->getTrademark->brand }}
                                            </div>
                                            <span class="">
                                                    <a class= " px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800" 
                                                    href="{{ route('categories.show', $post->category) }}" target="_blank">{{ $post->category->name }}</a>
                                            </span>
                                            <div class="text-sm text-gray-500">@include('posts.tags')</div>
                                          </td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>

                <!--Category chart card -->
                <div class="bg-transparent border-slate-900  rounded-md dark:bg-darker">
                      <!-- Card header -->
                        <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                                <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Ingresados a inventario por mes / año</h4>
                        </div>
                      <!-- Chart -->
                      <div class="relative p-4 h-72">
                          <ul class="list-group list-group-unbordered">
                                @foreach ($archive as $date)
                                  <li>{{ $date->month }} {{ $date->year }} ({{ $date->posts }})</li>
                              @endforeach
                          </ul>
                      </div>
                </div>
            <!-- endCharts -->
            </div>

        </div>
    </div>
</x-app-layout>