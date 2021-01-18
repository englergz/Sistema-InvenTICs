@extends('layouts.blog')

@section('content')
<section class="pages container">
    <article class="post">
        <div class="content-post">
            <h1 class="text-capitalize">Página no autorizada</h1>
            <span style="color:red">{{ $exception->getMessage() }}</span>
            <p><a href="{{ url()->previous() }}">Regresar</a></p>
        </div>
    </article>
</section>
@endsection
