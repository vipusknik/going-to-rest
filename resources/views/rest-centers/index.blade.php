@extends('master')

@section('title')
    Пляжный отдых
@endsection

@section('header')
   <!-- Header -->
    <div class="bg-yellow-light lg:hidden">
        <div class="container mx-auto">
            <rest-centers-search :reservoirs="{{ json_encode($reservoirs) }}" @resultsupdated="updateModels"></rest-centers-search>
        </div>
    </div>

    <!-- Ads filtering and sorting  -->
    <div class="mb-2">
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
                <rest-center v-for="center in models" :key="center.id" :center='center'></rest-center>
            </div>
        </main>
    </div>

    <!-- Coctail decoration (right) -->
    <div class="hidden lg:block lg:absolute bg-beach-decoraions-right lg:pin-t lg:pin-r"></div>
@endsection


@section ('extra')
    <!-- Umbrella decoration -->
    <div class="hidden lg:block lg:absolute bg-beach-decorations-umbrella"></div>
@endsection
