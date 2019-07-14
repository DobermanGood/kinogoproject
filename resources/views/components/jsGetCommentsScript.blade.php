<script>
    $(function() {

        @isset($_GET['page'])
            var url = '{{route('comments.'.$type.'', $data_id)}}' + '?page={{$_GET['page']}}';
        @else
            var url = '{{route('comments.'.$type.'', $data_id)}}';
        @endisset

        @if(isset($hide_count) and $hide_count == true)
            @isset($_GET['page'])
                url = url + '&hide_count=1';
            @else
                url = url + '?hide_count=1';
            @endisset
        @endif

$.ajax({
            url: url,
            success: function(data) {
                $('#comments-block').html(data);
            },
            error: function() {
                var code = '<h4 class="center title">Произошла ошибка загрузки комментариев, перезагрузите страницу</h4>';
                $('#comments-block').html(code);
            }
        });
    });
</script>