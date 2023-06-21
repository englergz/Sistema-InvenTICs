
    @foreach($post->photos as $photo)
    @if(pathinfo($photo->url, PATHINFO_EXTENSION) != 'pdf')
            <center>
            <h2 style="color: green">FOTO</h2>
            <h6>{{$photo->created_at}}</h6>
            <img src="{{ url('storage/'.$photo->url) }}" class="img-responsive" alt="{{ url('storage/'.$photo->url) }}">
            </center>

    @endif
    @endforeach

    @foreach($post->photos as $photo)
    @if(pathinfo($photo->url, PATHINFO_EXTENSION) == 'pdf')
        <center>
        <h2 style="color: green">PDF</h2>
        <h6>{{$photo->created_at}}</h6>
        <object data=
                {{ url('storage/'.$photo->url) }} 
                width="100%" 
                height="500"> 
        </object>
        </center>
    @endif
    @endforeach