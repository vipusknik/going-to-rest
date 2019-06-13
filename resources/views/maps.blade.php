@extends('master')

@section('title')
    Пляжный отдых
@endsection

@section('header')
   <!-- Header -->
   

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
@endsection


