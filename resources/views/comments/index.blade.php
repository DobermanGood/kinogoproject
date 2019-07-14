<example></example>

<div class="comments" id="comments">
    <div class="comments-block">
        @forelse($comments as $comment)
            <div class="comment">
                {{--АВАТАР--}}
                <div class="left">
                    <a href="#">
                        <img src="{{$comment->user->avatar}}" alt="{{$comment->user->name}}">
                    </a>
                </div>
                <div class="right">
                    {{--ИНФО ПОЛЬЗОВАТЕЛЯ И ДАТА КОММЕНТАРИЯ--}}
                    <div class="head">
                        <span class="title"><a href="#">{{$comment->user->name}}</a></span>
                        {{$comment->created_at}}
                        @if(!isset($hide_count))
                            |
                            <a href="#" class="comments_count">Комментов: {{$comment->user->comments()->count()}}</a>
                        @endif
                    </div>
                    {{--ТЕКСТ КОММЕНТАРИЯ--}}
                    <div class="content">
                        {{$comment->text}}
                    </div>
                </div>
            </div>
        @empty
            {{--ПОКАЗ ЧТО НЕТ КОММЕНТАРИЕВ--}}
            @include('components.filmListIfEmpty', ['text' => 'Комментариев пока нет'])
        @endforelse
        {{--ПАГИНАЦИЯ--}}
        @include('components.paginate', ['data' => $comments])
    </div>
</div>

<script>
    new Vue({
        el: '#addComment',
        data: {
            add: false,
            comment: {}
        }
    });
</script>