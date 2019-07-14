@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/films/index.css') }}">
@endsection

@section('title', ' - Фильмы категории: ' . $genre->name)

@section('content')
    <div class="page-header">
        <h3>{{$genre->name}}</h3>
    </div>
    <div class="films">
        @forelse($films as $film)
            @include('components.filmList', $film)
        @empty
            @include('components.filmListIfEmpty')
        @endforelse
    </div>
    <div class="container-pagination">
        {{$films->links()}}
    </div>
@endsection