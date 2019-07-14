<aside class="col-sm-12 col-md-4 col-lg-4 sidebar">
    <div class="bar">
        <div class="bar-title">
            <h4 class="title">Панель навигации</h4>
        </div>
        <div class="bar-content">
            <div class="left">
                <ul class="part">
                    <h4 class="title">Категории</h4>
                    {{--@isset($navigation)--}}
                        @foreach($navigation as $item)
                            <li><a href="{{ route('genres.show', ['id' => $item->id]) }}">{{$item->name}}</a></li>
                        @endforeach
                    {{--@endisset--}}
                </ul>
            </div>
            <div class="right">
                <ul class="part">
                    <h4 class="title">По году</h4>
                    <li><a href="{{route('films.order', ['by' => 'year_date', 'value' => '2015'])}}">2015</a></li>
                    <li><a href="{{route('films.order', ['by' => 'year_date', 'value' => '2016'])}}">2016</a></li>
                    <li><a href="{{route('films.order', ['by' => 'year_date', 'value' => '2017'])}}">2017</a></li>
                </ul>
                <ul class="part">
                    <h4 class="title">По странам</h4>
                    <li><a href="{{route('films.order', ['by' => 'country', 'value' => 'США'])}}">Американские</a></li>
                    <li><a href="{{route('films.order', ['by' => 'country', 'value' => 'Россия'])}}">Россииские</a></li>
                    <li><a href="{{route('films.order', ['by' => 'country', 'value' => 'Индия'])}}">Индийские</a></li>
                    <li><a href="{{route('films.order', ['by' => 'country', 'value' => 'Франция'])}}">Французкие</a></li>
                </ul>
                <ul class="part">
                    <h4 class="title">Сериалы</h4>
                    <li><a href="#">Русские</a></li>
                    <li><a href="#">Зарубежные</a></li>
                    <li><a href="#">Турецкие</a></li>
                </ul>
            </div>
        </div>
    </div>
</aside>