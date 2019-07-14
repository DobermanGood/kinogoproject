@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/films/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/films/show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comments/index.css') }}">
@endsection

@section('title', ' - ' . $film->title)

@section('content')
    <div class="film">
        <div class="page-header film-head">
            <h3 class="title">{{$film->title}}</h3>
            {{--ПОДКЛЮЧЕНИ ГОЛОСОВАНИИ--}}
            @include('components.votes', [ 'value' => floor($film->votes->avg('value')), 'film_id' => $film->id ])
        </div>
        {{--ИНФОРМАЦИЯ О КИНО--}}
        @include('components.filmList', ['film' => $film, 'show_more' => true])
        {{--КАРТИНКИ--}}
            <div class="images">
                @foreach($film->images as $image)
                    <a href="{{$image->url}}" class="col-xs-4">
                        <img src="{{$image->url}}" alt="{{$image->alt}}" title="{{$image->alt}}">
                    </a>
                @endforeach
            </div>
        {{--ВИДЕО--}}
        <div class="center-block">
            <h4 class="title">
                смотреть онлайн {{$film->title}}({{$film->year_date}})
                @if($film->bloor != 'TS')
                    в хорошем качестве
                @endif
            </h4>
            <v-video :data="{{ $film->video }}" class="video"></v-video>
        </div>
        {{--РЕКОММЕНДАЦИИ--}}
        @if(count($recommends) >= 1)
            <div class="recommend">
                <h4 class="title">Рекомендуем посмотреть</h4>
                <div class="links">
                    @foreach($recommends as $recommend)
                        <a href="{{route('films.show', $recommend->id)}}" class="recommend-film">
                            <img src="{{$recommend->image}}" alt="{{$recommend->title}}" title="{{$recommend->title}}">
                            {{$recommend->title}}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="bottom">
            <span class="date" title="Дата загрузки">{{$film->created_at}}</span>
        </div>
        {{--КОММЕНТАРИИ--}}
        <div id="comments-block"></div>
    </div>
@endsection

@section('script2')
    {{--ПОДКЛЮЧЕНИЕ КОММЕНТАРИЕВ "data_id" - ЭТО ID МОДЕЛИ ДЛЯ КОТОРОЙ ВЫЗЫВАЮТСЯ КОММЕНТАРИИ--}}
    @include('components.jsGetCommentsScript', ['data_id' => $film->id, 'type' => 'films']);
@endsection