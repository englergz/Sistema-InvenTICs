
@php
use Carbon\Carbon;
$now = Carbon::now();
$auth = auth()->user();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>@if(!is_null($posts)) REPORTE DE PRODUCTOS @else REPORTE {{$post->title.' No. '.$post->serial}}@endif | InvenTICs</title>
<style>
body{
	background: #fff;
	font-family: 'lato', sans-serif;
    
}

.logoHome{
	text-align: center;
}

.preload{
	border: 9.2px solid #072f50;
	width: 97.2%;
}
#mas{
	border: 1.2px solid #072f50;
	width: 60%;
}
header nav{
	text-align: center;
  }

  header  nav ul{
	 list-style: none;
	 display: inline-block;
  }

  header nav ul li{
	  margin: 0 10px;
  }

  header nav ul li{
	  text-decoration: none;
	  color: #333333;
	  font-family: "lato", sans-serif;
	  font-weight: bold;
  }

  header nav ul li a:hover{
	border-bottom: 2px solid #072f50;
	padding-bottom: 5px;
}
.pure-menu-item{
	text-align: center;
}
header nav li{
	margin: 0 10px;
}
header nav li{
	text-decoration: none;
	color: #333333;
	font-family: "lato", sans-serif;
	font-weight: bold;
}
header nav li a:hover{
	border-bottom: 2px solid #072f50;
	padding-bottom: 5px;
}
.logoHome{
	text-align: center;
}

.post{
	background: #fff;
    border-radius: 25px;
	margin-bottom: 50px;
}
.post .content-post{
	position: relative;
	padding: 90px 30px;
}
.post .category{
	background: #1b1581;
	padding: 5px 10px;
	color: white;
	position: absolute;
	right: -11px;
	top: 50px;
	text-transform: capitalize;
}
.post .category a{
	color: inherit;
	font-size: inherit;
}
.post figure{
	margin:0;
}
.post h1{
	font-size: 40px;
}
.post h2{
	font-weight: normal;
	font-style: italic;
}

.post p{
	line-height: 1.6;
}
.post a{
	text-decoration: none;
	font-size: 18px;
	font-weight: bold;
}
#noo{
	text-decoration: none;
	font-size: 15px;
    font-weight: none;
}
.post .tag{
	margin: 0 5px;
}
.post .tag a{
	color: inherit;
	font-size: inherit;
}
.post footer{
	margin-top: 65px;
	background: none;
}
cite, .cite{
	font-size: 22px;
	line-height: 1.7;
	display: block;
	margin-top: 20px;
	color: #909090;
}
cite span, .cite span{
	color: #7f7f7f;
	font-size: 16px;
}
cite .img-cite, .cite .img-cite{
	position: absolute;
	left: -20px;
}
.image-w-text div{
	max-width: 720px;
}
.image-w-text span.cite-2, span.cite-2{
	color: #999999;
	padding-left: 15px;
	border-left: 4px solid #eeeeee;
	display: block;
	line-height: 1.7;
	font-size: 19px;
}

.footer footer{
    position: fixed; 
    /*bottom: 0; */
    width: 87.2%; 
	background: #1b1581;
	padding: 45px;
	text-align: center;
	color: #ffffff;
}
.footer footer .logo{
	opacity: 0.4;
}
.footer footer p{
	opacity: 0.4;
}
.footer footer nav ul{
	margin-top: 5px;
}
.footer footer .divider-2{
	margin: 5px auto;
	width: 100%;
}
.footer footer nav ul li{
	margin: 0 5px;
}
.footer footer nav ul li a{
	color: white;
	text-decoration: none;
}
.footer footer .social-media-footer li a{
	display: block;
	width: 5px;
	height: 5px;
}
a.btn-bar{
	background: url('../img/nav-icon.png') no-repeat;
}

.grid-item {
	width: 464px;
	height: 120px;
	float: left;
}

.grid-item--height2{ height: 260px; }
.grid-item--height3{ height: 328px; }
.grid-item--height4{ height: 308px; }
.grid-item--height5{ height: 240px; }


.page{
	border-radius: 25px;
	background: #fff;
	/*box-shadow: 0px 0px 10px rgba(0,0,0,0.3);*/
    box-shadow: 0 16px 14px -2px rgba(0, 0, 0, 0.14), 0 6px 3px -2px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);

	margin-bottom: 50px;
	position: relative;
	padding: 65px 100px;
}
.page p, .page cite{
	line-height: 1.6;
}
.page h3{
	color: #b2b2b2;
	font-size: 22px;
	letter-spacing: 1px;
	font-weight: 300;
}
.page .latest-posts{
	max-width: 350px;
}
.page ul li{
	margin: 15px 0;
}



</style>
  </head>

  <body>
  <div class="preload"></div>
  <header class="space-inter">
    <div class="container space-between">
    <nav class="custom-wrapper" id="menu">
    <h3 style="color: green">REPORTE {{ $now->format('HisdmY') }}<h6 style="color: black">
        @if (Auth::check())generado por el usuario:{{' '.$auth->name.' |' }} @endif fecha: {{ $now->format('d M Y H:i A') }}</h6></h3>
   
    <h2 style="color: BLUE">{{ 'Sistema InvenTICs' }} </h2>
    {{ 'Cámara de Comercio de Tumaco' }}
    </nav>
    </div>
  </header>


<article class="post container">
@if(!is_null($posts))
@foreach($posts as $post)
    <div class="content-post">
        
        <h1>{{$post->title }}</h1>
        @include('posts.header')
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

        <div class="space-between">
            <center>
                @if(sizeof($post->photos) != 0)
                        <h3 style="color: green">ARCHIVOS</h3>
                        <h6>Adjuntos disponibles de este producto</h6>
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a role="button">
                                            Tipo de archivo
                                        </a>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a role="button">
                                            Link
                                        </a>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a role="button">
                                            Fecha
                                        </a>
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200"-->
                                @foreach($post->photos as $photo)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class=" px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800" >
                                            @if( pathinfo($photo->url, PATHINFO_EXTENSION) != 'pdf' )
                                                Imagen
                                            @else
                                                PDF
                                            @endif
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ asset('storage/'.$photo->url) }}" class="mr-3" target="_blank">
                                            <span class=" px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800" >
                                                ver adjunto
                                            </span>
                                        </a>
                                    </td>
                                    <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$photo->created_at->format('d M Y H:i A')}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            </div>        
                            </div>
                            </div>
                        </div>
                        @endif
            <br><br>
            @if(sizeof($post->logHistory) != 0)
                <h3 style="color: green">HISTORIAL DEL PRODUCTO</h3>
                <h6>{{' Registrado: '.$post->published_at->format('d M Y H:i A')}}</h6>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                                            <span class="noo" >
                                                {{ $post->employee_name }}<br> {{' '.$post->employee_surname }}
                                            </span>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{ $post->employee_debtor_since }}<br>  
                                            <a href="{{ route('admin.users.show', $post->assigns) }}">
                                            <span id="noo" >
                                                by:{{' '.$post->assigns->name }}
                                            </span></a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{ $post->employee_debtor_until  }}<br>
                                            <a href="{{ route('admin.users.show', $post->receives) }}">
                                            <span id="noo" >
                                            by:{{' '.$post->receives->name}}
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
                <h6>{{' Producto registrado: '.$post->published_at->format('d M Y H:i A')}}</h6>
             
            @endif	
        </center>
		</div>
    </div>
    <h6>
        @if($post->post_id != 0)
            {{'ID: '.$post->serial.'00'.$post->post_id.' '}}
        @else
            {{'ID: '.$post->serial.'00X'}}
        @endif
    </h6>
    
<div id="mas" class="preload"></div>
@endforeach
@else
<div class="content-post">
        
        <h1>{{$post->title }}</h1>
        @include('posts.header')
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

        <div class="space-between">
        <center>
                        @if(sizeof($post->photos) != 0)
                        <h3 style="color: green">ARCHIVOS</h3>
                        <h6>Adjuntos disponibles de este producto</h6>
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a role="button">
                                            Tipo de archivo
                                        </a>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a role="button">
                                            Link
                                        </a>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a role="button">
                                            Fecha
                                        </a>
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200"-->
                                @foreach($post->photos as $photo)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class=" px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800" >
                                            @if( pathinfo($photo->url, PATHINFO_EXTENSION) != 'pdf' )
                                                Imagen
                                            @else
                                                PDF
                                            @endif
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ asset('storage/'.$photo->url) }}" class="mr-3" target="_blank">
                                            <span class=" px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800" >
                                                ver adjunto
                                            </span>
                                        </a>
                                    </td>
                                    <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$photo->created_at->format('d M Y H:i A')}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            </div>        
                            </div>
                            </div>
                        </div>
                        @endif
            <br><br>
            @if(sizeof($post->logHistory) != 0)
                <h3 style="color: green">HISTORIAL DEL PRODUCTO</h3>
                <h6>{{' Registrado: '.$post->published_at->format('d M Y H:i A')}}</h6>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                                            <span class="noo" >
                                                {{ $post->employee_name }}<br> {{' '.$post->employee_surname }}
                                            </span>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{ $post->employee_debtor_since }}<br>  
                                            <a href="{{ route('admin.users.show', $post->assigns) }}">
                                            <span id="noo" >
                                                by:{{' '.$post->assigns->name }}
                                            </span></a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{ $post->employee_debtor_until  }}<br>
                                            <a href="{{ route('admin.users.show', $post->receives) }}">
                                            <span id="noo" >
                                            by:{{' '.$post->receives->name}}
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
                <h6>{{' Producto registrado: '.$post->published_at->format('d M Y H:i A')}}</h6>
             
            @endif	
        </center>
		</div>
    </div>
    <h6>
        @if($post->post_id != 0)
            {{'ID: '.$post->serial.'00'.$post->post_id.' '}}
        @else
            {{'ID: '.$post->serial.'00X'}}
        @endif
    </h6>
    
<div id="mas" class="preload"></div>

@endif
</article>

  <section class="footer">
    
  
  <footer id="footer">
    <div class="container">
      <nav>
        
      </nav>
      <center>
      <p >
        &copy;
        Sistema InvenTICs<br>
        <i class="material-icons">by</i>
      <span class="c-white">Camara de Comercio de Tumaco</span>
    </p>
    </center>
    </div>
</footer>
</section>

</body>
</html>
