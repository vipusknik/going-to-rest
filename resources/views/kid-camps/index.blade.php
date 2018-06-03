@extends('master')

@section('title')
    Детский отдых
@endsection

@section('header')
    <!-- Header -->
    <div class="bg-yellow-light lg:hidden">
        <div class="container mx-auto">
            <kid-camps-search :cities="{{ json_encode($cities) }}" @resultsupdated="updateModels"></kid-camps-search>
        </div>
    </div>

    <!-- Ads filtering and sorting  -->
    <div class="mb-6">
        <div class="container mx-auto">
            <div class="relative">
                <!-- Dropdown search filters menu -->
                <portal-target name="sm-md-kid-camps-search-filters" slim></portal-target>

                @include('partials.banners')
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Ball decoration (left) -->
    <div class="hidden lg:block lg:absolute kid-camps-decorations-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

    <div class="container mx-auto lg:px-20">
        <main class="lg:px-20">

            <!-- Page heading -->
            <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:text-center lg:font-hairline lg:mb-6">
                Детский отдых
            </h1>

            <!-- Search for large devices -->
            <portal-target name="lg-xl-kid-camps-search" slim></portal-target>

            <!-- List -->
            <div class="px-2 lg:px-0">
                <kid-camp v-for="model in models" :key="model.id" :model="model"></kid-camp>
            </div>
        </main>
    </div>

    <!-- Coctail decoration (right) -->
    <div class="hidden lg:block lg:absolute kid-camps-decoraions-right lg:pin-t lg:pin-r"></div>
@endsection
