<script>
    $('.votes span').click(function() {
        @auth
            var vote = $(this).prevAll('div');
            console.log(vote);
            var data = {
                'film_id': $(this).attr('data-film'),
                'user_id': {{Auth::user()->id}},
                'value': $(this).attr('data-value'),
                '_token': '{{csrf_token()}}'
            };
            var url = 'films/'+ data.film_id+'/vote/' ;
            $.ajax({
                url: url,
                type: 'post',
                data: data,
                success: function(data) {
                    vote.show();
                    vote.text('Good');
                    setTimeout(function() {
                        $('.notifications').hide();
                    }, 3000);
                },
                error: function(data) {
                    vote.show();
                    if(data.responseText == 'Уже голосовали') {
                        vote.text(data.responseText);
                        setTimeout(function () {
                            $('.notifications').hide();
                        }, 3000);
                    }
                    else {
                        vote.text('Произошла ошибка');
                        setTimeout(function () {
                            $('.notifications').hide();
                        }, 3000);
                    }
                }
            });
        @else
            alert('Вы не авторизованы !');
        @endauth
    });
</script>