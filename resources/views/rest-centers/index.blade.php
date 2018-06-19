@extends('master')

@section('title')
    Пляжный отдых
@endsection

@section('header')
   <!-- Header -->
    <div class="bg-yellow-light fixed w-full z-40 h-17 lg:hidden">
        <div class="container mx-auto">
            <rest-centers-search :reservoirs="{{ json_encode($reservoirs) }}"></rest-centers-search>
        </div>
    </div>

    <!-- Ads filtering and sorting  -->
    <div class="mb-2 pt-16 lg:pt-0">
        <div class="container mx-auto">
            <div class="relative">
                <!-- Dropdown search filters menu -->
                <portal-target name="sm-md-rest-centers-search-filters" slim></portal-target>

                @include('partials.banners')

                <!-- Sorting for small and medium devices -->
                {{-- <portal-target name="sm-md-rest-centers-search-sorting" slim></portal-target> --}}
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Ball decoration (left) -->
    <div class="hidden lg:block lg:absolute bg-beach-decoraions-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

    <models-page inline-template :models-initial="{{ json_encode($models) }}">
        <div class="container mx-auto lg:px-20">
            <main class="lg:px-20">

                <!-- Page heading -->
                <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:text-center lg:font-hairline lg:mb-6">
                    Пляжный отдых
                </h1>

                <!-- Search for large devices -->
                <portal-target name="lg-xl-rest-centers-search" slim></portal-target>

                <!-- List -->
                <div class="px-2 lg:px-0">
                    <rest-center v-for="model in models" :key="model.id" :model="model"></rest-center>
                </div>
            </main>
        </div>
    </models-page>

    <!-- Coctail decoration (right) -->
    <div class="hidden lg:block lg:absolute bg-beach-decoraions-right lg:pin-t lg:pin-r"></div>
@endsection


@section ('extra')
    <!-- Umbrella decoration -->
    <div class="hidden lg:block lg:absolute bg-beach-decorations-umbrella"></div>
@endsection
