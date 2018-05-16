<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <title>
            @yield('title')
        </title>

         @yield ('head')
    </head>
    <body>
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

        <div id="app" class="antialiased">
            @include ('admin.layouts.nav')

            @yield('content')

            <flash message="{{ session('flash') }}"></flash>
        </div>

        <script>
            window.CKEDITOR_BASEPATH = '/ckeditor/';
        </script>

        <script src="{{ mix('js/app.js') }}"></script>
        @yield ('script')

    </body>
</html>
