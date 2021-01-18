@extends('layouts.blog')

@section('content')

        
<section class="pages container">
<article class="post">
    <div class="page page-contact">
        <h1 class="text-capitalize">Contacto</h1>
        <p>Telefono:
            7272582
            </br>
            Dirección:
            Barrio Pradomar Isla Morro
            </br>
            Ciudad:
            San Andres De Tumaco
            </br>
            Departamento:
            Nariño</p>
        <div class="divider-2" style="margin:25px 0;"></div>
        <div class="form-contact">
            <form action="#">
                <div class="input-container container-flex space-between">
                    <input type="text" placeholder="Nombre" class="input-name">
                    <input type="text" placeholder="Correo Electronico" class="input-email">
                </div>
                <div class="input-container">
                    <input type="text" placeholder="Asunto" class="input-subject">
                </div>
                <div class="input-container">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Mensaje"></textarea>
                </div>
                <div class="send-message">
                </br>
                    <a href="#" class="container text-center text-uppercase c-green">Enviar mensaje</a>
                </div>
            </form>
        </div>

    </div>
    </article>
</section>
@endsection
