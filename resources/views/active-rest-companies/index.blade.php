@extends('master')

@section('title')
    Активный отдых (+ прокат/продажа снаряжения)
@endsection

@section('header')
    <!-- Header -->
    <div class="bg-yellow-light fixed w-full z-40 h-17 lg:hidden">
        <div class="container mx-auto">
            <active-rest-companies-search :activities="{{ json_encode($activities) }}">
            </active-rest-companies-search>
        </div>
    </div>

    <!-- Ads filtering and sorting  -->
    <div class="mb-6 pt-16 lg:pt-0">
        <div class="container mx-auto">
            <div class="relative">
                <!-- Dropdown search filters menu -->
                <portal-target name="sm-md-active-rest-companies-search-filters" slim></portal-target>

                @include('partials.banners')

                <!-- Sorting for small and medium devices -->
                <portal-target name="sm-md-active-rest-companies-search-sorting" slim></portal-target>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Decoration (left) -->
    <div class="hidden lg:block lg:absolute active-rest-decorations-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

    <models-page inline-template :models-initial="{{ json_encode($models) }}">
        <div class="container mx-auto lg:px-20">
            <main class="lg:px-20">
                <!-- Page heading -->
                <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:mr-20 lg:text-center lg:font-hairline lg:mb-6">
                    Активный отдых (+ прокат/продажа снаряжения)
                </h1>

                <!-- Search for large devices -->
                <portal-target name="lg-xl-active-rest-companies-search" class="md:mr-20" slim></portal-target>

                <!-- List -->
                <div class="px-2 lg:px-0">
                    <active-rest-company v-for="model in models" :key="model.id" :model="model"></active-rest-company>
                </div>
            </main>
        </div>
    </models-page>

    <!-- Decoration (right) -->
    <div class="hidden lg:block lg:absolute active-rest-decorations-right lg:pin-t lg:pin-r"></div>
@endsection
