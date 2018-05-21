<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
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
            <!-- Header -->
            <div class="bg-yellow-light lg:hidden">
                <div class="container mx-auto">
                    <active-rest-companies-search :activities="{{ json_encode($activities) }}" @resultsupdated="updateModels">
                    </active-rest-companies-search>
                </div>
            </div>

            <!-- Ads filtering and sorting  -->
            <div class="mb-6">
                <div class="container mx-auto">
                    <div class="relative">
                        <!-- Dropdown search filters menu -->
                        <portal-target name="sm-md-active-rest-companies-search-filters" slim></portal-target>

                        <!-- Ads -->
                        <div class="flex p-2 lg:px-12">
                            <img src="{{ asset('images/ads.png') }}" alt="ads" class="block w-full h-24 md:w-1/2 md:mr-2 lg:rounded-xl lg:h-32 lg:mr-6 lg:border-2 lg:border-white">
                            <img src="{{ asset('images/ads.png') }}" alt="ads" class="hidden w-full h-24 md:block md:w-1/2 lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
                        </div>

                        <!-- Sorting for small and medium devices -->
                        <portal-target name="sm-md-active-rest-companies-search-sorting" slim></portal-target>
                    </div>
                </div>
            </div>

            <!-- Main menu for small and medium devices -->
            <sm-md-main-menu></sm-md-main-menu>

            <!-- Main menu for large and xl devices -->
            <div class="container mx-auto lg:px-12">
                <nav class="hidden lg:block lg:flex lg:justify-around">
                    <div class="px-4 py-1 bg-white opacity-50 rounded">
                        <a href="{{ route('rest-centers.index') }}" class="text-lg text-black">пляжный отдых</a>
                    </div>

                    <div class="px-4 py-1 bg-white opacity-50 rounded">
                        <a href="#" class="text-lg text-black">активный отдых</a>
                    </div>

                    <div class="px-4 py-1 bg-white opacity-50 rounded">
                        <a href="#" class="text-lg text-black">детский отдых</a>
                    </div>

                    <div class="px-4 py-1 bg-white opacity-50 rounded">
                        <a href="#" class="text-lg text-black">рыбалка и охота</a>
                    </div>

                    <div class="px-4 py-1 bg-white rounded">
                        <a href="#" class="text-lg text-black">медицинский туризм</a>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="lg:relative lg:overflow-hidden lg:pb-20">
            <!-- Bee decoration (left) -->
            <div class="hidden lg:block lg:absolute bg-bee-decoraions-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

            <div class="container mx-auto lg:px-20">
                <main class="lg:px-20">

                    <!-- Page heading -->
                    <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:text-center lg:font-hairline lg:mb-6">
                        Медицинский туризм
                    </h1>

                    <!-- Search for large devices -->
                    <portal-target name="lg-xl-active-rest-companies-search" slim></portal-target>

                    <!-- List -->
                    <div class="px-2 lg:px-0">
                        <active-rest-company v-for="model in models" :key="model.id" :model="model"></active-rest-company>
                    </div>
                </main>
            </div>

            <!-- Tea decoration (right) -->
            <div class="hidden lg:block lg:absolute bg-tea-decoraions-right lg:pin-t lg:pin-r"></div>
        </div>
    </div>

    <script src="{{ mix('js/app-ui.js') }}"></script>
</body>
</html>
