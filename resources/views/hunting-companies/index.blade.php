@extends('master')

@section('title')
    Рыбалка и охота
@endsection

@section('header')
    <!-- Header -->
    <div class="bg-yellow-light lg:hidden">
        <div class="container mx-auto">
            <hunting-companies-search :regions="{{ json_encode($regions) }}" @resultsupdated="updateModels">
            </hunting-companies-search>
        </div>
    </div>

    <!-- Ads filtering and sorting  -->
    <div class="mb-6">
        <div class="container mx-auto">
            <div class="relative">
                <!-- Dropdown search filters menu -->
                <portal-target name="sm-md-hunting-companies-search-filters" slim></portal-target>

                @include('partials.banners')

                <!-- Sorting for small and medium devices -->
                <portal-target name="sm-md-hunting-companies-search-sorting" slim></portal-target>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Decoration (left) -->
    <div class="hidden lg:block lg:absolute hunting-companies-decorations-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

    <div class="container mx-auto lg:px-20">
        <main class="lg:px-20">
            <!-- Page heading -->
            <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:mr-20 lg:text-center lg:font-hairline lg:mb-6">
                Рыбалка и охота
            </h1>

            <!-- Search for large devices -->
            <portal-target name="lg-xl-hunting-companies-search" class="md:mr-20" slim></portal-target>

            <!-- List -->
            <div class="px-2 lg:px-0">
                <hunting-company v-for="model in models" :key="model.id" :model="model"></hunting-company>
            </div>
        </main>
    </div>

    <!-- Decoration (right) -->
    <div class="hidden lg:block lg:absolute hunting-companies-decorations-right lg:pin-t lg:pin-r"></div>
@endsection
