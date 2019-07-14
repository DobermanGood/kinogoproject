@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/profile/edit.css') }}">
@endsection

@section('title', ' - пользователь - ' . $user->name)

@section('content')
    @if($errors->count() > 0)
        @foreach($errors as $error)
            <li>{{$error->message}}</li>
        @endforeach
    @endif

    <div class="user-edit">
        <form action="{{route('profile.update', $user->name)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field()  }} {{ method_field('put')  }}
            <div class="form-group">
                <label for="name">Имя пользователя:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="avatar">Аватар:</label>
                <img src="{{$user->avatar}}" alt="{{$user->name}}" class="avatar">
                <input type="file" name="avatar" id="avatar">
            </div>
            <div class="form-group">
                <button type="submit" class="link">Редактировать</button>
            </div>
        </form>
    </div>
@endsection
