{{--ЕСЛИ СРЕДНЕЕ ЗНАЧЕНИЕ РЕЙТИНГА БОЛЬШЕ НОЛЯ ТО ВЫВОДИТСЯ ОНО, ИНАЧЕ 0--}}
<div class="votes">
    <div class="notifications">

    </div>
    @if($value > 0)
        @for($i=0; $i<5; $i++)
            @if($value > $i)
                <span data-value="{{$i+1}}" data-film="{{$film_id}}" class="on"> </span>
            @else
                <span data-value="{{$i+1}}" data-film="{{$film_id}}" class="off"></span>
            @endif
        @endfor
    @else
        @for($i=0; $i<5; $i++)
            <span data-value="{{$i+1}}" data-film="{{$film_id}}" class="vote off"></span>
        @endfor
    @endif
</div>
