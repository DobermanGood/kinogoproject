@isset($carousel)
    <div class="block carousel">
        <div class="responsive">
            @foreach($carousel as $film)
                <div>
                    <a href="{{route('films.show', $film->id)}}">
                        <img src="{{ $film->image }}" alt="{{$film->title}}" title="{{$film->title}}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endisset
