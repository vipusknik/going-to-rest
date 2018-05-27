@extends('master')

@section('title')
    Активный отдых
@endsection

@section('header')
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
@endsection

@section('content')
    <!-- Decoration (left) -->
    <div class="hidden lg:block lg:absolute active-rest-decorations-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

    <div class="container mx-auto lg:px-20">
        <main class="lg:px-20">
            <!-- Page heading -->
            <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:mr-20 lg:text-center lg:font-hairline lg:mb-6">
                Активный отдых
            </h1>

            <!-- Search for large devices -->
            <portal-target name="lg-xl-active-rest-companies-search" class="md:mr-20" slim></portal-target>

            <!-- List -->
            <div class="px-2 lg:px-0">
                <active-rest-company v-for="model in models" :key="model.id" :model="model"></active-rest-company>
            </div>
        </main>
    </div>

    <!-- Decoration (right) -->
    <div class="hidden lg:block lg:absolute active-rest-decorations-right lg:pin-t lg:pin-r"></div>
@endsection
