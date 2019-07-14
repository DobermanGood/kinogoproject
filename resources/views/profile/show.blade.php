@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/profile/show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comments/index.css') }}">
@endsection

@section('title', ' - пользователь - ' . $user->name)

@section('content')
    <div class="user-info">
        <div class="col-md-4 image">
            <img src="{{$user->avatar}}" alt="{{$user->name}}}">
            @if($is_me)
                <a href="{{route('profile.edit', $user->name)}}" class="link">Редактировать</a>
            @endif
        </div>
        <div class="col-md-7 col-md-offset-1 info">
            <ul>
                <li>Статус: <b>{{$user->role->display_name}}</b></li>
                <li>E-mail: <b>{{$user->email}}</b></li>
                <li>Дата регистрации: <b>{{$user->created_at}}</b></li>
                <li>
                    Добавленные фильмы:
                    @if($user->films->count())
                    <ul>
                        @foreach($user->films as $film)
                            <li>
                                <a href="{{route('films.show', $film->id)}}">{{$film->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
            </ul>
            <v-comments></v-comments>
        </div>
    </div>
    <div class="comments">
        <h4 class="text-center">Комментарии пользователя {{$user->name}}</h4>
        <div id="comments-block"></div>
    </div>
@endsection

@section('script2')
    {{--ПОДКЛЮЧЕНИЕ КОММЕНТАРИЕВ "data_id" - ЭТО ID МОДЕЛИ ДЛЯ КОТОРОЙ ВЫЗЫВАЮТСЯ КОММЕНТАРИИ--}}
    @include('components.jsGetCommentsScript', ['data_id' => $user->id, 'type' => 'users', 'hide_count' => true]);
@endsection