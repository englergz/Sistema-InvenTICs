<header class="container-flex space-between">
    <div class="date">
        <span class="c-gris">
            @if($post->published_at)
                {{ optional($post->published_at)->format('M d') }} - {{ optional($post->published_at)->diffforHumans() }}
            @else Publicación culta,
            <div class="read-more">
                <span class="post-category"><a style="color:#145A32" href="{{ route('admin.posts.edit', $post) }}"> ¿Publicar ahora?</a></span>
            </div>
            @endif
        </span>
    </div>
    @if ($post->category)
        <div class="post-category">
            <span class="category">
                <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
            </span>
        </div>
    @endif
</header>
