<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="font-sans antialiased bg-yellow-dark">
    <div>
        <div class="container mx-auto">
            <div>
                <div class="flex flex-col items-center pt-10 mb-8">
                    <div class="mb-2">
                        {{-- Heading --}}
                        <div class="h-10 heading-bg-text mb-1"></div>

                        {{-- Subheading --}}
                        <div class="text-xs text-center uppercase italic tracking-tight">
                            Восточный Казахстан - популярные <span class="hidden sm:inline-block">направления и </span>места отдыха
                        </div>
                    </div>

                    <div class="flex items-center w-5/6">
                        <div class="flex-1">
                            <input type="search" name="query" class="text-xs w-full p-2 rounded-l-lg">
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
                                    ">
                                Найти
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col justify-around items-center">
                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg">
                            <a href="#" class="flex items-center no-underline">
                                <div class="w-1/4 mr-4">
                                    <img src="{{ asset('images/site-category-icons/beach-holidays.png') }}"
                                         alt="Пляжный отдых"
                                         class="block mx-auto w-10 h-10 rounded-full">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4">
                                    <h2 class="text-lg font-normal">Пляжный отдых</h2>
                                </div>
                            </a>
                        </div>

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg">
                            <a href="#" class="flex items-center no-underline">
                                <div class="w-1/4 mr-4">
                                    <img src="{{ asset('images/site-category-icons/active-rest.png') }}"
                                         alt="Активный отдых"
                                         class="block mx-auto w-10 h-10 rounded-full">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4">
                                    <h2 class="text-lg font-normal">Активный отдых</h2>
                                </div>
                            </a>
                        </div>

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg">
                            <a href="#" class="flex items-center no-underline">
                                <div class="w-1/4 mr-4">
                                    <img src="{{ asset('images/site-category-icons/children-holidays.png') }}"
                                         alt="Детский отдых"
                                         class="block mx-auto w-10 h-10 rounded-full">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4">
                                    <h2 class="text-lg font-normal">Детский отдых</h2>
                                </div>
                            </a>
                        </div>

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg">
                            <div class="flex items-center">
                                <div class="w-1/4 mr-4">
                                    <img src="{{ asset('images/site-category-icons/fishing-and-hunting.png') }}"
                                         alt="Рыбалка и охота"
                                         class="block mx-auto w-10 h-10 rounded-full">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4">
                                    <h2 class="text-lg font-normal">Рыбалка и охота</h2>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg">
                            <a href="#" class="flex items-center no-underline">
                                <div class="w-1/4 mr-4">
                                    <img src="{{ asset('images/site-category-icons/medical-tourism.png') }}"
                                         alt="Медицинский туризм"
                                         class="block mx-auto w-10 h-10 rounded-full">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4">
                                    <h2 class="text-lg font-normal">Медицинский туризм</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
