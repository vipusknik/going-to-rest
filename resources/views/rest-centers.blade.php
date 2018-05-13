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

    <div class="h-screen" id="app" v-cloak>

        <!-- Header -->
        <div class="mb-6">
            <div class="container mx-auto">
                <header class="relative">
                    <div v-if="! showSearchDrowdown" class="flex space-between items-center py-3 px-4 bg-yellow-light">
                        <div @click="showMainMenu = true">
                            <img src="{{ asset('images/icons/menu.svg') }}" alt="menu" class="block w-8 h-8">
                        </div>

                        <div class="flex-1 text-center text-2xl italic">Пляжный отдых</div>

                        <div class="hidden p-1 border-2 border-white rounded bg-yellow-dark mr-2 md:block" @click="showSorting = !showSorting">
                            <img src="{{ asset('images/icons/sorting.png') }}" alt="menu" class="block w-8 h-8">
                        </div>

                        <div class="p-2 border-2 border-white rounded bg-yellow-dark" @click="showSearchDrowdown = true">
                            <img src="{{ asset('images/icons/search.png') }}" alt="menu" class="block w-6 h-6">
                        </div>
                    </div>

                    <div v-else class="flex space-between items-center py-3 px-4 bg-yellow-light">
                        <div class="flex-1 h-10 border-2 border-white rounded-l-lg">
                            <input type="text" class="w-full h-full px-2 main-search-input" placeholder="Введите название">
                        </div>

                        <div class="p-2 border border-white rounded-r-lg bg-yellow-dark">
                            <img src="{{ asset('images/icons/search.png') }}" alt="menu" class="block w-6 h-6">
                        </div>
                    </div>

                    <!-- Dropdown search filters menu -->
                    <div v-if="showSearchDrowdown" class="absolute bg-yellow-dark w-full px-6 py-10 pb-4">
                        <div class="flex space-between mb-3">
                            <div class="w-1/2 mr-3">
                                <select name="" id="" class="w-full rounded-lg p-2">
                                    <option value="">Водоем</option>
                                    <option value="">Алаколь</option>
                                    <option value="">Сибины</option>
                                </select>
                            </div>

                            <div class="w-1/2">
                                <select name="" id="" class="w-full rounded-lg p-2">
                                    <option value="">1 человек</option>
                                    <option value="">2 человека</option>
                                    <option value="">3 человека</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="text-2xl text-grey-darker text-center font-bold mb-3">
                                Цена за сутки
                            </div>

                            <div class="flex space-between">
                                <div class="w-1/2 mr-3 flex items-center">
                                    <div class="text-lg text-white bg-teal-dark rounded-l-lg h-10 px-2 pt-2">
                                        от
                                    </div>

                                    <div class="h-10">
                                        <input type="text" class="rounded-r-lg w-full h-full px-2">
                                    </div>
                                </div>

                                <div class="w-1/2 mr-3 flex items-center">
                                    <div class="text-lg text-white bg-teal-dark rounded-l-lg h-10 px-2 pt-2">
                                        до
                                    </div>

                                    <div class="h-10">
                                        <input type="text" class="rounded-r-lg w-full h-full px-2">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="text-2xl text-grey-darker text-center font-bold mb-3">
                                Тип размещения
                            </div>

                            <select name="" id="" class="w-full rounded-lg p-2">
                                <option value=""></option>
                                <option value="">Домик</option>
                                <option value="">Номер</option>
                            </select>
                        </div>

                        <div class="flex">
                            <div class="flex items-center w-1/2 mr-4">
                                <div class="mr-3">
                                    <label for="cheap-first" class="block h-8 w-8 rounded-lg bg-white"></label>
                                    <input type="radio" name="sorting-price" id="cheap-first" value="cheap-first" class="hidden">
                                </div>
                                <div class="flex-1 text-xl text-grey-darker font-bold">Только с питанием</div>
                            </div>

                            <div class="flex justify-center w-1/2">
                                <button class="text-lg text-white font-bold tracking-wide bg-teal-dark px-4 rounded-lg w-full h-10">
                                    Поиск
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Ads -->
                    <div class="flex p-2">
                        <img src="{{ asset('images/ads.png') }}" alt="ads" class="block w-full h-24 md:w-1/2 md:mr-2">
                        <img src="{{ asset('images/ads.png') }}" alt="ads" class="hidden w-full h-24 md:block md:w-1/2">
                    </div>

                    <!-- Sorting -->
                    <div class="md:absolute md:pin-t md:mt-12 md:pin-l md:bg-yellow-dark md:w-full md:z-50">
                        <div class="flex space-between items-center px-4 md:hidden">
                            <div>
                                <img src="{{ asset('images/icons/sorting.png') }}" alt="sorting" class="block w-10 h-12">
                            </div>

                            <div class="flex-1 text-center text-2xl text-black font-bold">Сортировка</div>

                            <div @click="showSorting = !showSorting">
                                <img v-if="! showSorting" src="{{ asset('images/icons/angle-down.svg') }}" alt="expand sorting" class="block w-6 h-4">
                                <img v-else src="{{ asset('images/icons/close.svg') }}" alt="expand sorting" class="block w-6 h-4">
                            </div>
                        </div>

                        <!-- Sorting expanded -->
                        <div v-if="showSorting" class="mt-3 px-8 md:flex md:items-start">
                            <div class="mb-6 md:flex md:flex-wrap md:space-between md:mb-0 md:w-3/4">
                                <div class="flex items-center mb-2 md:w-1/2 md:flex-order-1">
                                    <div class="flex-1 text-2xl text-grey-darker font-bold">Сначала дешевые</div>
                                    <div>
                                        <label for="cheap-first" class="block h-10 w-10 rounded-lg bg-white"></label>
                                        <input type="radio" name="sorting-price" id="cheap-first" value="cheap-first" class="hidden">
                                    </div>
                                </div>

                                <div class="flex items-center mb-2 md:w-1/2 md:flex-order-3">
                                    <div class="flex-1 text-2xl text-grey-darker font-bold">Сначала дорогие</div>
                                    <div>
                                        <label for="expensive-first" class="block h-10 w-10 rounded-lg bg-white"></label>
                                        <input type="radio" name="sorting-price" id="expensive-first" value="expensive-first" class="hidden">
                                    </div>
                                </div>

                                <div class="flex items-center mb-2 md:w-1/2 md:flex-order-2 md:justify-end">
                                    <div class="flex-1 text-2xl text-grey-darker font-bold md:flex-initial mr-6">От А до Я</div>
                                    <div>
                                        <label for="a-z" class="block h-10 w-10 rounded-lg bg-white"></label>
                                        <input type="radio" name="sorting-abc" id="a-z" value="a-z" class="hidden">
                                    </div>
                                </div>

                                <div class="flex items-center md:w-1/2 md:flex-order-4 md:justify-end">
                                    <div class="flex-1 text-2xl text-grey-darker font-bold md:flex-initial mr-6">От Я до А</div>
                                    <div>
                                        <label for="z-a" class="block h-10 w-10 rounded-lg bg-white"></label>
                                        <input type="radio" name="sorting-abc" id="z-a" value="z-a" class="hidden">
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-center md:w-1/4 md:justify-end">
                                <button class="text-lg text-white font-bold tracking-wide bg-teal-dark py-2 px-4 rounded-lg md:text-xl">
                                    Применить
                                </button>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>

        <!-- Main menu -->
        <div v-if="showMainMenu" class="fixed pin-t pin-l h-full w-64 bg-yellow-dark overflow-x-hidden z-50">
            <menu class="m-0 p-0">
                <div class="flex items-center justify-center bg-yellow-light w-full py-6 px-2 mb-4">
                    <div class="text-xl font-bold mr-2">
                        Выберите категорию
                    </div>

                    <div @click="showMainMenu = false">
                        <img src="{{ asset('images/icons/close.svg') }}" alt="" class="block w-3 h-3">
                    </div>
                </div>

                <div class="flex flex-col justify-around items-center sm:flex-row md:px-4">
                    <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-3 sm:px-1 sm:py-4 sm:rounded-xl">
                        <a href="{{ route('rest-centers.index') }}" class="flex items-center no-underline sm:flex-col">
                            <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                <img src="{{ asset('images/icons/site-category-icons/beach-holidays.png') }}"
                                     alt="Пляжный отдых"
                                     class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                            </div>

                            <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                <h2 class="text-lg font-normal">Пляжный отдых</h2>
                            </div>
                        </a>
                    </div>

                    <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-3 sm:px-1 sm:py-4 sm:rounded-xl">
                        <a href="#" class="flex items-center no-underline sm:flex-col">
                            <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                <img src="{{ asset('images/icons/site-category-icons/active-rest.png') }}"
                                     alt="Активный отдых"
                                     class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                            </div>

                            <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                <h2 class="text-lg font-normal">Активный отдых</h2>
                            </div>
                        </a>
                    </div>

                    <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-3 sm:px-1 sm:py-4 sm:rounded-xl">
                        <a href="#" class="flex items-center no-underline sm:flex-col">
                            <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                <img src="{{ asset('images/icons/site-category-icons/children-holidays.png') }}"
                                     alt="Детский отдых"
                                     class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                            </div>

                            <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                <h2 class="text-lg font-normal">Детский отдых</h2>
                            </div>
                        </a>
                    </div>

                    <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-3 sm:px-1 sm:py-4 sm:rounded-xl">
                        <div class="flex items-center sm:flex-col">
                            <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                <img src="{{ asset('images/icons/site-category-icons/fishing-and-hunting.png') }}"
                                     alt="Рыбалка и охота"
                                     class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                            </div>

                            <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                <h2 class="text-lg font-normal">Рыбалка и охота</h2>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-3 sm:px-1 sm:py-4 sm:rounded-xl">
                        <a href="#" class="flex items-center no-underline sm:flex-col">
                            <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                <img src="{{ asset('images/icons/site-category-icons/medical-tourism.png') }}"
                                     alt="Медицинский туризм"
                                     class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                            </div>

                            <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                <h2 class="text-lg font-normal">Медицинский туризм</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </menu>
        </div>

        <!-- Main content -->
        <div :class="{ 'opacity-50': showSearchDrowdown }">
            <div class="container mx-auto">
                <main>
                    <!-- List -->
                    <div class="px-2">

                        <!-- List item with image -->
                        <div class="bg-white rounded-lg mb-3 md:rounded-2xl md:mb-6">

                            <!-- List item name -->
                            <div class="relative py-2 text-center">
                                <hr class="absolute block pin-l ml-8 pin-t mt-4 text-teal-dark bg-teal-dark h-1 w-5/6 z-10">
                                <h3 class="inline text-teal-dark font-bold px-2 bg-white list-item-name">БО "NEW МОХНАТКА"</h3>
                            </div>

                            <div class="flex flex-col md:flex-row">
                                <!-- List item image -->
                                <div class="md:self-end md:w-2/5">
                                    <img src="{{ asset('images/photo.png') }}" alt="" class="block w-full h-auto md:rounded-bl-2xl md:rounded-tr-2xl">
                                </div>

                                <div class="pt-3 px-4 pb-1 md:w-3/5 md:flex md:flex-wrap md:relative">
                                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pb-3 md:pr-1 md:items-start">
                                        <div class="w-1/4">
                                            <img src="{{ asset('images/icons/location.png') }}" alt="address" class="block w-8 h-8">
                                        </div>

                                        <div class="w-3/4">
                                            Бухтарма. у подножия горы Мохнатка на территории б/о Мохнатка
                                        </div>
                                    </div>

                                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:pb-3 md:pl-3 md:items-start">
                                        <div class="w-1/4">
                                            <img src="{{ asset('images/icons/contacts.png') }}" alt="address" class="block w-8 h-8">
                                        </div>

                                        <div class="w-3/4">
                                            8 777 279 40 33, 8 777 279 40 33
                                        </div>
                                    </div>

                                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                                        <div class="w-1/4">
                                            <img src="{{ asset('images/icons/price.png') }}" alt="address" class="block w-8 h-8">
                                        </div>

                                        <div class="w-3/4">
                                            стоимость проживания от  9 700 тг <span class="text-red-light">возможно питание</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-dotted md:border-teal-dark md:pl-3 md:items-start">
                                        <div class="w-1/4">
                                            <img src="{{ asset('images/icons/accomodation.png') }}" alt="address" class="block w-8 h-8">
                                        </div>

                                        <div class="flex items-center w-3/4 md:relative">
                                            <div class="flex-1">
                                                2х и 4х местные домики
                                            </div>

                                            <div class="md:hidden">
                                                <button class="text-sm text-white font-bold bg-teal-dark rounded px-4 py-2">Подробнее</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden md:block md:absolute md:pin-b md:pin-r">
                                        <button class="text-base text-white font-bold bg-teal-dark rounded-tl-lg rounded-br-xl px-4 py-1">Подробнее</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- List item without image -->
                        <div class="bg-white rounded-lg">

                            <!-- List item name -->
                            <div class="relative py-2 text-center">
                                <hr class="absolute block pin-l ml-8 pin-t mt-4 text-teal-dark bg-teal-dark h-1 w-5/6 z-10">
                                <h3 class="inline text-teal-dark font-bold z-50 px-2 bg-white">БО "УЛЬБА"</h3>
                            </div>

                            <div class="pt-3 px-4 pb-1 md:flex">
                                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:items-start">
                                    <div class="mr-3 md:w-1/4 md:mr-1">
                                        <img src="{{ asset('images/icons/location.png') }}" alt="address" class="block w-8 h-8">
                                    </div>

                                    <div class="w-3/4">
                                        Бухтарма. у подножия горы Мохнатка на территории б/о Мохнатка
                                    </div>
                                </div>

                                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:pl-2 md:items-start">
                                    <div class="mr-3 md:w-1/4 md:mr-1">
                                        <img src="{{ asset('images/icons/contacts.png') }}" alt="address" class="block w-8 h-8">
                                    </div>

                                    <div class="w-3/4">
                                        8 777 279 40 33, 8 777 279 40 33
                                    </div>
                                </div>

                                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:pl-2 md:items-start">
                                    <div class="mr-3 md:w-1/4 md:mr-1">
                                        <img src="{{ asset('images/icons/price.png') }}" alt="address" class="block w-8 h-8">
                                    </div>

                                    <div class="w-3/4">
                                        стоимость проживания от  9 700 тг <span class="text-red-light">возможно питание</span>
                                    </div>
                                </div>

                                <div class="flex items-center border-teal-dark py-2 md:w-1/4 md:pl-2 md:items-start">
                                    <div class="mr-3 md:w-1/4 md:mr-1">
                                        <img src="{{ asset('images/icons/accomodation.png') }}" alt="address" class="block w-8 h-8">
                                    </div>

                                    <div class="flex items-center w-full w-3/4">
                                        <div class="flex-1">
                                            2х и 4х местные домики
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

    <script src="{{ mix('js/app-ui.js') }}"></script>
</body>
</html>
