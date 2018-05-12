<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="font-sans antialiased bg-yellow-dark">
    <div class="h-screen">
        <div class="h-2/5 mb-6 main-page-bg-upper md:h-1/3 md:mb-2">
            <div class="container mx-auto">
                <div class="flex flex-col items-center pt-12 mb-8">
                    <div class="mb-2 md:mb-4">
                        {{-- Heading --}}
                        <div class="h-10 mb-1 heading-bg-text md:h-16"></div>

                        {{-- Subheading --}}
                        <div class="text-xs text-center uppercase italic tracking-tight">
                            Восточный Казахстан - популярные <span class="hidden sm:inline-block">направления и&nbsp;</span>места отдыха
                        </div>
                    </div>

                    <div class="flex items-center w-5/6 md:w-3/4">
                        <div class="flex-1">
                            <input type="search" name="query" class="text-xs w-full p-2 rounded-l-lg md:h-10">
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
                                    ">
                                Найти
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container mx-auto">
                <div>
                    <div class="flex flex-col justify-around items-center md:flex-row md:px-4">
                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg hover:bg-yellow-light hover:opacity-9 md:w-32 md:mr-3 md:px-1 md:py-4 md:rounded-xl">
                            <a href="#" class="flex items-center no-underline md:flex-col">
                                <div class="w-1/4 mr-4 md:w-auto md:mb-4 md:mr-0">
                                    <img src="{{ asset('images/site-category-icons/beach-holidays.png') }}"
                                         alt="Пляжный отдых"
                                         class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4 md:w-auto">
                                    <h2 class="text-lg font-normal">Пляжный отдых</h2>
                                </div>
                            </a>
                        </div>

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg hover:bg-yellow-light hover:opacity-9 md:w-32 md:mr-3 md:px-1 md:py-4 md:rounded-xl">
                            <a href="#" class="flex items-center no-underline md:flex-col">
                                <div class="w-1/4 mr-4 md:w-auto md:mb-4 md:mr-0">
                                    <img src="{{ asset('images/site-category-icons/active-rest.png') }}"
                                         alt="Активный отдых"
                                         class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4 md:w-auto">
                                    <h2 class="text-lg font-normal">Активный отдых</h2>
                                </div>
                            </a>
                        </div>

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg hover:bg-yellow-light hover:opacity-9 md:w-32 md:mr-3 md:px-1 md:py-4 md:rounded-xl">
                            <a href="#" class="flex items-center no-underline md:flex-col">
                                <div class="w-1/4 mr-4 md:w-auto md:mb-4 md:mr-0">
                                    <img src="{{ asset('images/site-category-icons/children-holidays.png') }}"
                                         alt="Детский отдых"
                                         class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4 md:w-auto">
                                    <h2 class="text-lg font-normal">Детский отдых</h2>
                                </div>
                            </a>
                        </div>

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg hover:bg-yellow-light hover:opacity-9 md:w-32 md:mr-3 md:px-1 md:py-4 md:rounded-xl">
                            <div class="flex items-center md:flex-col">
                                <div class="w-1/4 mr-4 md:w-auto md:mb-4 md:mr-0">
                                    <img src="{{ asset('images/site-category-icons/fishing-and-hunting.png') }}"
                                         alt="Рыбалка и охота"
                                         class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4 md:w-auto">
                                    <h2 class="text-lg font-normal">Рыбалка и охота</h2>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg hover:bg-yellow-light hover:opacity-9 md:w-32 md:mr-3 md:px-1 md:py-4 md:rounded-xl">
                            <a href="#" class="flex items-center no-underline md:flex-col">
                                <div class="w-1/4 mr-4 md:w-auto md:mb-4 md:mr-0">
                                    <img src="{{ asset('images/site-category-icons/medical-tourism.png') }}"
                                         alt="Медицинский туризм"
                                         class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                                </div>

                                <div class="text-center text-black font-thin break-words lowercase w-3/4 md:w-auto">
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
