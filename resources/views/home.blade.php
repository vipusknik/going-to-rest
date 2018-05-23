<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="font-sans antialiased bg-yellow-dark">
    <div class="h-screen">
        <div class="mb-6 main-page-upper-part md:mb-2 lg:mb-8 xl:-mb-3">
            <div class="container mx-auto">
                <div class="flex flex-col items-center pt-12 mb-8 lg:pt-20">
                    <div class="mb-2 md:mb-4 lg:w-2/5">
                        {{-- Heading --}}
                        <div class="h-10 mb-1 heading-bg-text md:h-16"></div>

                        {{-- Subheading --}}
                        <div class="text-xs text-center uppercase italic tracking-tight lg:text-sm">
                            Восточный Казахстан - популярные <span class="hidden sm:inline-block">направления и&nbsp;</span>места отдыха
                        </div>
                    </div>

                    <div class="flex items-center w-5/6 md:w-3/4 lg:w-1/2">
                        <div class="flex-1">
                            <input type="search" name="query" class="text-xs w-full p-2 rounded-l-lg md:h-10 lg:rounded-l-xl lg:px-3">
                        </div>

                        <div>
                            <button class="
                                        text-xs
                                        text-white
                                        font-semibold
                                        tracking-wide
                                        uppercase
                                        p-2
                                        rounded-r-lg
                                        bg-red
                                        hover:bg-orange-dark
                                        md:h-10
                                        md:w-24
                                        lg:rounded-r-xl
                                    ">
                                Найти
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="lg:mb-12">
            <div class="container mx-auto">
                <div>
                    <div class="flex flex-col justify-around items-center sm:flex-row sm:justify-center md:px-4">
                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer zoom hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-6 sm:px-1 sm:py-4 sm:rounded-xl md:mr-8 xl:mr-12">
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

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer zoom hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-6 sm:px-1 sm:py-4 sm:rounded-xl md:mr-8 xl:mr-12">
                            <a href="{{ route('active-rest-companies.index') }}" class="flex items-center no-underline sm:flex-col">
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

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer zoom hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-6 sm:px-1 sm:py-4 sm:rounded-xl md:mr-8 xl:mr-12">
                            <a href="{{ route('kid-camps.index') }}" class="flex items-center no-underline sm:flex-col">
                                <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                    <img src="{{ asset('images/icons/site-category-icons/children-holidays.png') }}"
                                         alt="Детский отдых"
                                         class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                    <h2 class="text-lg font-normal">Детский <div class="hidden md:block"></div> отдых</h2>
                                </div>
                            </a>
                        </div>

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer zoom hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-6 sm:px-1 sm:py-4 sm:rounded-xl md:mr-8 xl:mr-12">
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

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer zoom hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:px-1 sm:py-4 sm:rounded-xl">
                            <a href="{{ route('medical-centers.index') }}" class="flex items-center no-underline sm:flex-col">
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
                </div>
            </div>
        </nav>
    </div>
</body>
</html>
