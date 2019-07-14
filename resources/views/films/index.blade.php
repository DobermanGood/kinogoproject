@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/films/index.css') }}">
@endsection

@section('title', ' - Фильмы онлайн')

@section('content')
    <div class="films">
        @forelse($films as $film)
            @include('components.filmList', $film)
        @empty
            @include('components.filmListIfEmpty')
        @endforelse
    </div>
    {{--ПАГИНАЦИЯ--}}
    @include('components.paginate', ['data' => $films])
@endsection