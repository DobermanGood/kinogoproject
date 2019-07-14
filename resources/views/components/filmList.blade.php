<div class="film">
    {{--ЗАГОЛОВОК ( ЕСЛИ ПОДРОБНОЕ ТО НЕ ПОКАЗЫВАЕТ ) --}}
    @if(!isset($show_more))
        <div class="film-head">
            <h4 class="title"><a href="{{route('films.show', $film->id)}}">{{$film->title}}</a></h4>
            {{--ПОДКЛЮЧЕНИ ГОЛОСОВАНИИ--}}
            @include('components.votes', [ 'value' => floor($film->votes->avg('value')), 'film_id' => $film->id ])
        </div>
    @endif
    <div class="body">
        {{--КАРТИНКА--}}
        <a href="{{$film->image}}">
            <img src="{{$film->image}}" alt="{{$film->title}}" class="image">
        </a>
        {{--ОПИСАНИЕ ФИЛЬМА--}}
        <p class="text">{{ str_limit($film->exceprt, 700) }}</p>
    </div>
    <div class="info">
        <strong>Год выпуска: </strong><a href="{{route('films.order', ['by' => 'year_date', 'value' => $film->year_date])}}">{{$film->year_date}}</a><br>
        <strong>Страна: </strong><a href="{{route('films.order', ['by' => 'country', 'value' => $film->country])}}">{{$film->country}}</a><br>

        <strong>Жанр: </strong>
        @foreach($film->genres as $genre)
            <a href="{{route('genres.show', ['id' => $genre->id])}}">{{$genre->name}}</a>
        @endforeach
        <br>

        <strong>Качество: </strong>{{$film->bloor}}<br>
        <strong>Перевод: </strong>{{$film->translate}}<br>
        <strong>Продолжнительность: </strong>{{$film->long}}<br>
        <strong>Премьера (РФ): </strong>{{$film->premier_date}}

        @isset($show_more)
            <br><br>
            <strong>Режиссер: </strong>{{$film->director}}<br>
            <strong>В ролях: </strong>{{$film->roles}}
        @endisset

    </div>
    {{--ЕСЛИ ПОДРОБНОЕ ТО ССЫЛКИ НА "ПОДРОБНЕЕ" НЕ ПОКАЗЫВАЮТСЯ--}}
    @if(!isset($show_more))
        <div class="bottom">
            <a href="{{route('films.show', $film->id)}}" class="link">Смотреть онлайн</a>
            <span class="date">{{$film->created_at}}</span>
        </div>
    @endif
</div>

@section('script')
    @include('components.jsVotes');
@endsection