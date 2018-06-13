@extends('master')

@section('header')
    <!-- Header -->
    <div class="bg-yellow-light fixed w-full z-40 h-17 lg:hidden">
        <div class="container mx-auto">
            <sm-md-nav title="" back-url="{{ url()->previous() }}"></sm-md-nav>
        </div>
    </div>

    <!-- Ads filtering and sorting  -->
    <div class="mb-2 pt-16 lg:pt-0">
        <div class="container mx-auto">
            <div class="relative">
                @include('partials.banners')
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Decoration (left) -->
    <div class="hidden lg:block lg:absolute medical-centers-decorations-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

    <div class="container mx-auto pt-2 lg:px-20 lg:pt-0">
        <main class="lg:px-20">

            {{-- Search input --}}
            <form class="flex items-center h-10 mb-8 px-2 lg:px-0">
                <input type="text" name="q" placeholder="Введите название" class="block flex-1 h-full text-lg py-2 px-4 rounded-l-xl">
                <button class="w-16 h-full p-2 text-white font-bold tracking-wide bg-teal-dark rounded-r-xl hover:bg-teal md:w-24">Поиск</button>
            </form>

            <!-- Search for large devices -->
            <portal-target name="lg-xl-medical-centers-search" slim></portal-target>

            <!-- List -->
            <div class="px-2 lg:px-0">
                @foreach ($results as $model)
                    <component is="{{ kebab_case(class_basename($model->class)) }}"
                              :model="{{ json_encode($model) }}"
                              :show-category="true">
                    </component>
                @endforeach
            </div>
        </main>
    </div>

    <!-- Decoration (right) -->
    <div class="hidden lg:block lg:absolute medical-centers-decorations-right lg:pin-t lg:pin-r"></div>
@endsection
