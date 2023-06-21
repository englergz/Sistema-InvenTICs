@extends('layouts.blog')

@section('content')

<article class="post container">

    <div class="content-post">
    <br><br>	
        @include('posts.header')
        
        <h1>{{$post->title }}</h1>
        
        <h3>{{ $post->getTrademark->brand.' S/N#'. $post->serial}}</h3>
        <div class="divider"></div>
        <h4> Descripción y características del dispositivo:</h4>
        <div class="image-w-text">
            {!! $post->body !!}
          
        </div>
        @include('posts.owner')
        <footer class="container-flex space-between">
            @include('posts.tags')
        </footer>

        <div class="comments">
            <div class="divider"></div>
            <div id="disqus_thread"></div>
            
        </div><!-- .comments -->
        <div class="py-5 space-between">
        @include( $post->viewType() )		
		</div>
        @if(sizeof($post->logHistory) != 0)
                <h3 style="color: green">HISTORIAL DEL PRODUCTO</h3>
                <h6>{{' Registrado: '.$post->created_at}}</h6>
                    <div class="bg-white overflow-hidden ">
                    <div class="flex flex-col">
                
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class=" overflow-hidden border-b border-gray-200 ">
                            <table class="min-w-full divide-y divide-gray-200">
                            <!--x-data-table-->
                                <thead class="bg-gray-50">
                                <!--x-slot name="head"--> 
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a role="button">
                                            Funcionario responable
                                        </a></th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a role="button">
                                            Fecha asignación
                                        </a></th>
                                        
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a role="button">
                                            Fecha devolución
                                        </a></th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a role="button">
                                            Observación
                                        </a></th>
                                    </tr>
                                <!--/x-slot-->
                                <!--x-slot name="body"-->
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200"-->
                                @foreach($post->logHistory as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('admin.users.show', $post->assigns) }}">
                                            <span class=" px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800" >
                                                {{ $post->employee_name }}<br> {{' '.$post->employee_surname }}
                                            </span>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{ $post->employee_debtor_since }}<br>
                                            <a href="{{ route('admin.users.show', $post->assigns) }}">
                                            <span class=" px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800" >
                                            {{'Entregó: '.$post->assigns->name }}
                                            </span></a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{ $post->employee_debtor_until  }}<br>
                                            <a href="{{ route('admin.users.show', $post->receives) }}">
                                            <span class=" px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800" >
                                            {{'Recibió: '.$post->receives->name}}
                                            </span></a>
                                        </div>
                                    </td>
                                    <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$post->obs}}
                                    </td>
                                </tr>
                                <!-- Más items... -->
                                @endforeach
                                
                                <!--/x-slot-->
                                </tbody>
                            <!--/x-data-table-->
                            </table>
                           
                        </div>
                        
                    </div>        
                </div>
                </div>
            </div>
            @else
                <h3 style="color: green">SIN HISTORIAL DE DEVOLUCIÓN</h3>
                <h6>{{' Producto registrado: '.$post->created_at}}</h6>
             
            @endif
            <br><br>	
            <div class="divider"></div>
    </div>
</article>

@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/twitter-bootstrap.css') }}">
@endpush

@push('scripts')

<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="{{ asset('js/twitter-bootstrap.js') }}"></script>
@endpush

