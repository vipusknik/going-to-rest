@extends('master')

@section('title')
    Медицинский туризм
@endsection

@section('header')
    <!-- Header -->
    <div class="bg-yellow-light lg:hidden">
        <div class="container mx-auto">
            <medical-centers-search :types="{{ json_encode($types) }}"
                                    :cities="{{ json_encode($cities) }}"
                                    :regions="{{ json_encode($regions) }}"
                                    @resultsupdated="updateModels">
            </medical-centers-search>
        </div>
    </div>

    <!-- Ads filtering and sorting  -->
    <div class="mb-6">
        <div class="container mx-auto">
            <div class="relative">
                <!-- Dropdown search filters menu -->
                <portal-target name="sm-md-medical-centers-search-filters" slim></portal-target>

                <div class="flex p-2 lg:px-12">
                    <img src="{{ asset('images/promo/med/sm-1.gif') }}" class="block md:hidden w-full h-24 md:w-1/2 md:mr-2 lg:rounded-xl lg:h-32 lg:mr-6 lg:border-2 lg:border-white">
                    <img src="{{ asset('images/promo/med/lg-1.gif') }}" class="hidden w-full h-24 md:block md:w-1/2 md:mr-2 lg:rounded-xl lg:h-32 lg:mr-6 lg:border-2 lg:border-white">
                    <img src="{{ asset('images/promo/med/lg-2.gif') }}" class="hidden w-full h-24 md:block md:w-1/2 lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
                </div>

                <!-- Sorting for small and medium devices -->
                <portal-target name="sm-md-medical-centers-search-sorting" slim></portal-target>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Decoration (left) -->
    <div class="hidden lg:block lg:absolute medical-centers-decorations-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

    <div class="container mx-auto lg:px-20">
        <main class="lg:px-20">

            <!-- Page heading -->
            <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:text-center lg:font-hairline lg:mb-6">
                Медицинский туризм
            </h1>

            <!-- Search for large devices -->
            <portal-target name="lg-xl-medical-centers-search" slim></portal-target>

            <!-- List -->
            <div class="px-2 lg:px-0">
                <medical-center v-for="model in models" :key="model.id" :model="model"></medical-center>
            </div>
        </main>
    </div>

    <!-- Decoration (right) -->
    <div class="hidden lg:block lg:absolute medical-centers-decorations-right lg:pin-t lg:pin-r"></div>
@endsection
