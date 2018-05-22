<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased bg-yellow-dark">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <div class="h-screen lg:relative" id="app" style="overflow-x: hidden" v-cloak>
        <div class="rest-centers-page-upper-part lg:pt-16 lg:mb-4">
            @yield('header')
            @include('main-nav')
        </div>

        <!-- Main content -->
        <div class="lg:relative lg:overflow-hidden lg:pb-20">
            @yield('content')
        </div>

        @yield('extra')
    </div>

    <script src="{{ mix('js/app-ui.js') }}"></script>
</body>
</html>
