<header class="container-flex space-between">
                
    <div class="date">
        <span class="c-gris">
        
            @if(!is_null($post->employee_debtor_since) )
            <span class="post-category" style="color:#1b1581">
                @if($post->employee_id) En calidad de préstamo  | Última fecha asignada:
                    {{ optional($post->employee_debtor_since)->format('M d') }} - {{ optional($post->employee_debtor_since)->diffforHumans() }}
                @endif
               
            </span>
            @if($post->employee_id) 
            <div class="read-more">
                <a href="{{ route('admin.employees.show', $post->employeeDebtor) }}">
                <span class="post-category" style="color:#1b1581">
                {!! $post->employeeDebtor->first_name.' '.$post->employeeDebtor->second_name
                    .' '. $post->employeeDebtor->surname.' '. $post->employeeDebtor->second_surname !!}
                </span></a>
            </div>
            <div class="read-more">
                <span class="post-category" style="color:#1b1581">
                {{ $post->employeeDebtor->profession.' • '. $post->employeeDebtor->process }}
                </span>
            </div>
            @else 
                <div class="read-more">
                    <span class="post-category" style="color:#1b1581">
                        Producto disponible, sin asignar responsable de producto,
                    </span>
                </div>
                <div class="read-more">
                    <span class="post-category"><a style="color:#1b1581" href="{{ route('admin.posts.index') }}"> ¿Asignar?</a></span>
                </div>
            @endif
            @else Nunca ha sido prestado, producto disponible en calidad de préstamo,
            <div class="read-more">
                <span class="post-category"><a style="color:#1b1581" href="{{ route('admin.posts.index') }}"> ¿Asignar un funcionario?</a></span>
            </div>
            @endif
        </span>
    </div>
    @if ($post->category)
        <div class="post-category">
            <span class="category">
                <a href="{{ route('categories.show', $post->category) }}"> {{ $post->category->name }}</a>
            </span>
        </div>
    @endif
</header>
