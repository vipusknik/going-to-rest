<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased bg-yellow-dark">
    <div class="h-screen">
        <div class="mb-8">
            <div class="container mx-auto">
                <header>
                    <div class="flex space-between items-center py-3 px-4 bg-yellow-light">
                        <div>
                            <img src="{{ asset('images/icons/menu.svg') }}" alt="menu" class="block w-8 h-8">
                        </div>

                        <div class="flex-1 text-center text-2xl italic">Пляжный отдых</div>

                        <div class="p-2 border-2 border-white rounded bg-yellow-dark">
                            <img src="{{ asset('images/icons/search.png') }}" alt="menu" class="block w-6 h-6">
                        </div>
                    </div>

                    <div class="p-2">
                        <img src="{{ asset('images/ads.png') }}" alt="ads" class="block w-full h-24">
                    </div>

                    <!-- Sorting -->
                    <div>
                        <div class="flex space-between items-center px-4">
                            <div>
                                <img src="{{ asset('images/icons/sorting.png') }}" alt="sorting" class="block w-10 h-12">
                            </div>

                            <div class="flex-1 text-center text-2xl text-black font-bold">Сортировка</div>

                            <div>
                                <img src="{{ asset('images/icons/angle-down.svg') }}" alt="expand sorting" class="block w-6 h-4">
                            </div>
                        </div>

                        <!-- Sorting expanded -->
                        <div class="mt-3 px-8">
                            <div class="mb-6">
                                <div class="flex items-center mb-2">
                                    <div class="flex-1 text-2xl text-grey-darker font-bold">Сначала дешевые</div>
                                    <div>
                                        <label for="cheap-first" class="block h-10 w-10 rounded-lg bg-white"></label>
                                        <input type="radio" name="sorting-price" id="cheap-first" value="cheap-first" class="hidden">
                                    </div>
                                </div>

                                <div class="flex items-center mb-2">
                                    <div class="flex-1 text-2xl text-grey-darker font-bold">Сначала дорогие</div>
                                    <div>
                                        <label for="expensive-first" class="block h-10 w-10 rounded-lg bg-white"></label>
                                        <input type="radio" name="sorting-price" id="expensive-first" value="expensive-first" class="hidden">
                                    </div>
                                </div>

                                <div class="flex items-center mb-2">
                                    <div class="flex-1 text-2xl text-grey-darker font-bold">От А до Я</div>
                                    <div>
                                        <label for="a-z" class="block h-10 w-10 rounded-lg bg-white"></label>
                                        <input type="radio" name="sorting-abc" id="a-z" value="a-z" class="hidden">
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="flex-1 text-2xl text-grey-darker font-bold">От Я до А</div>
                                    <div>
                                        <label for="z-a" class="block h-10 w-10 rounded-lg bg-white"></label>
                                        <input type="radio" name="sorting-abc" id="z-a" value="z-a" class="hidden">
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-center">
                                <button class="text-lg text-white font-bold tracking-wide bg-teal-dark py-2 px-4 rounded-lg">
                                    Применить
                                </button>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>

        <div>
            <div class="container mx-auto">
                <main>

                    <!-- List -->
                    <div class="px-2">

                        <!-- List item -->
                        <div class="bg-white rounded-lg mb-3">

                            <!-- List item name -->
                            <div class="relative py-2 text-center">
                                <hr class="absolute block pin-l ml-8 pin-t mt-4 text-teal-dark bg-teal-dark h-1 w-5/6 z-10">
                                <h3 class="inline text-teal-dark font-bold z-50 px-2 bg-white">БО "NEW МОХНАТКА"</h3>
                            </div>

                            <!-- List item image -->
                            <div>
                                <img src="{{ asset('images/photo.png') }}" alt="" class="block w-full h-auto">
                            </div>

                            <div class="pt-3 px-4 pb-1">
                                <div class="flex items-center border-b border-dotted border-teal-dark py-2">
                                    <div class="mr-3">
                                        <img src="{{ asset('images/icons/location.png') }}" alt="address" class="block w-12 h-auto">
                                    </div>

                                    <div>
                                        Бухтарма. у подножия горы Мохнатка на территории б/о Мохнатка
                                    </div>
                                </div>

                                <div class="flex items-center border-b border-dotted border-teal-dark py-2">
                                    <div class="mr-3">
                                        <img src="{{ asset('images/icons/contacts.png') }}" alt="address" class="block w-8 h-auto">
                                    </div>

                                    <div>
                                        8 777 279 40 33, 8 777 279 40 33
                                    </div>
                                </div>

                                <div class="flex items-center border-b border-dotted border-teal-dark py-2">
                                    <div class="mr-3">
                                        <img src="{{ asset('images/icons/price.png') }}" alt="address" class="block w-10 h-auto">
                                    </div>

                                    <div>
                                        стоимость проживания от  9 700 тг <span class="text-red-light">возможно питание</span>
                                    </div>
                                </div>

                                <div class="flex items-center border-teal-dark py-2">
                                    <div class="mr-3">
                                        <img src="{{ asset('images/icons/accomodation.png') }}" alt="address" class="block w-10 h-auto">
                                    </div>

                                    <div class="flex items-center w-full">
                                        <div class="flex-1">
                                            2х и 4х местные домики
                                        </div>

                                        <div>
                                            <button class="text-sm text-white font-bold bg-teal-dark rounded px-4 py-2">Подробнее</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- List item -->
                        <div class="bg-white rounded-lg">

                            <!-- List item name -->
                            <div class="relative py-2 text-center">
                                <hr class="absolute block pin-l ml-8 pin-t mt-4 text-teal-dark bg-teal-dark h-1 w-5/6 z-10">
                                <h3 class="inline text-teal-dark font-bold z-50 px-2 bg-white">БО "УЛЬБА"</h3>
                            </div>

                            <div class="pt-3 px-4 pb-1">
                                <div class="flex items-center border-b border-dotted border-teal-dark py-2">
                                    <div class="mr-3">
                                        <img src="{{ asset('images/icons/location.png') }}" alt="address" class="block w-12 h-auto">
                                    </div>

                                    <div>
                                        Бухтарма. у подножия горы Мохнатка на территории б/о Мохнатка
                                    </div>
                                </div>

                                <div class="flex items-center border-b border-dotted border-teal-dark py-2">
                                    <div class="mr-3">
                                        <img src="{{ asset('images/icons/contacts.png') }}" alt="address" class="block w-8 h-auto">
                                    </div>

                                    <div>
                                        8 777 279 40 33, 8 777 279 40 33
                                    </div>
                                </div>

                                <div class="flex items-center border-b border-dotted border-teal-dark py-2">
                                    <div class="mr-3">
                                        <img src="{{ asset('images/icons/price.png') }}" alt="address" class="block w-10 h-auto">
                                    </div>

                                    <div>
                                        стоимость проживания от  9 700 тг <span class="text-red-light">возможно питание</span>
                                    </div>
                                </div>

                                <div class="flex items-center border-teal-dark py-2">
                                    <div class="mr-3">
                                        <img src="{{ asset('images/icons/accomodation.png') }}" alt="address" class="block w-10 h-auto">
                                    </div>

                                    <div class="flex items-center w-full">
                                        <div class="flex-1">
                                            2х и 4х местные домики
                                        </div>

                                        <div>
                                            <button class="text-sm text-white font-bold bg-teal-dark rounded px-4 py-2">Подробнее</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
