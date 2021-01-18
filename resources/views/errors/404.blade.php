@extends('layouts.blog')

@section('content')
<section class="pages container">
        <article class="post">
            <div class="content-post">

                <h1 class="text-capitalize">Página no encontrada</h1>
                <p>Regresar a <a href="{{ url()->previous()}}">Inicio</a></p>

            </div>
        </article>
</section>
@endsection
