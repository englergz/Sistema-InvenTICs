@if(pathinfo($post->photos->first()->url, PATHINFO_EXTENSION) != 'pdf')
<figure>
    <img src="{{  asset('./storage/'.$post->photos->first()->url) }}"
        class="img-responsive"
        alt="Foto: {{ $post->title }}"
        style="width:100%"
    >
</figure>
@else
    <center>
        <h1 style="color: green">PDF</h1> 
        <object data=
                {{ url('storage/'.$post->photos->first()->url) }} 
                width="100%" 
                height="900"> 
        </object>
    </center>
@endif