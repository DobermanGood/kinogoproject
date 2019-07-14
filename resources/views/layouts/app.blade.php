<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico')  }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('link')
</head>
<body>
    <div id="app">
        {{--ПОДКЛЮЧЕНИЕ ВЕРХНЕЙ НАВИГАЦИИ--}}
        @include('components.nav-header')
        <div class="container">
            {{--ПОДКЛЮЧЕНИЕ КАРУСЕЛИ--}}
            @include('components.carousel')
            <div class="row main">
                {{--@include('components.notifications')--}}
                {{--ПОДКЛЮЧЕНИЕ ЛЕВОГОЙ НАВИГАЦИИ С КАТЕГОРИЯМИ--}}
                @include('components.navigation')
                <main class="col-sm-12 col-md-8 col-lg-8 content">
                    @yield('content')
                </main>
            </div>
            <footer>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dicta doloribus ex labore quae soluta suscipit. Ab architecto at consequuntur, dicta dignissimos eaque et illo incidunt iusto maxime nesciunt optio perspiciatis placeat sit voluptates. Ab beatae blanditiis esse, et eum eveniet illo impedit ipsam laboriosam laborum maxime minima quo, quod saepe sapiente tempore ullam ut veniam, voluptatem voluptates. A accusamus consequatur cumque delectus doloribus eligendi est eum eveniet ex, expedita explicabo facere facilis hic iusto laboriosam magnam maiores natus optio pariatur perspiciatis placeat, porro quam quas quasi quibusdam, quis quo rerum saepe sunt voluptatibus. Aperiam atque dolores doloribus eveniet labore sed, sit unde voluptates? Asperiores commodi deserunt, dolor earum harum impedit ipsum iste omnis quae, quaerat qui repellat, sequi? Deleniti ex hic inventore ipsum magni placeat quam quidem quisquam. Autem cumque delectus doloribus nihil nulla perferendis quibusdam quo rerum sint, veritatis? Amet at aut autem blanditiis consequuntur corporis cumque distinctio dolore dolorem eos et ex excepturi hic impedit in iure laboriosam libero maiores molestiae, mollitia natus neque nostrum obcaecati officia possimus quasi quibusdam ratione repellendus sed similique totam vel veritatis voluptatum. Asperiores at deleniti dolorum ducimus eos exercitationem impedit in iusto libero magni numquam, placeat provident quasi rem, sapiente vel voluptatibus? Adipisci amet asperiores, consequatur corporis dignissimos dolorem doloribus dolorum eum eveniet excepturi explicabo illo in libero maxime molestias numquam qui, repellat similique totam voluptatem. Architecto, aspernatur aut ea eaque, eveniet facere facilis fugit hic ipsam iusto magni nam neque officia quos repellendus tempora totam veniam, voluptatem! Autem corporis deleniti dignissimos dolor error esse excepturi, facilis in ipsam labore natus nobis optio porro qui recusandae, reiciendis rerum sit voluptatem. Amet deserunt eligendi itaque iusto, saepe tenetur vel veniam. Ad adipisci, delectus dolor doloremque illum inventore iusto magni odit, quibusdam, rerum suscipit voluptatibus! A architecto debitis dicta fugit sequi vero voluptatum.
            </footer>
        </div>



    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    @yield('script')
    @yield('script2')
</body>
</html>
