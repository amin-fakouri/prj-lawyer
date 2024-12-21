
<div>



    <hr style="margin: auto; width: 90%">
    <br>

    @foreach($links as $link)
        @if($link->role == 1)
            <a class="m-5" target="_blank" href="{{ $link->link }}">{{ $link->link }}</a>
        @endif
    @endforeach


</div>
