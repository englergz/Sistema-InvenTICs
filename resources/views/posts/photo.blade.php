<figure>
    <img src="{{ url($post->photos->first()->url) }}"
        class="img-responsive"
        alt="Foto: {{ $post->title }}"
    >
</figure>
