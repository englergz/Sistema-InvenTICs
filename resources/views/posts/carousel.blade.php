@php
    $c = 0;
@endphp
<div class="gallery-photos" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 464 }'>
    @foreach($post->photos as $photo)
    @if( pathinfo($photo->url, PATHINFO_EXTENSION) != 'pdf' )
        <figure class="grid-item grid-item--height2   {{ $c = $c + 1 }}">
          
            @if($c === 4)
                <a href="{{ route('posts.show', $post) }}" class=" overlay c-green">+{{ $post->photos->count() - 3 }}</a>
                @break

            @endif
            <img src="{{ url('storage/'.$photo->url) }}" class="img-responsive" alt="{{ url('storage/'.$photo->url) }}">
        </figure>
        @if ($photo->number == 5)
       
        @endif
        
    @endif
    @endforeach
</div>
