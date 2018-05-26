@extends('master')

@section('title')
    {{ $model->name }}
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

                <!-- Ads -->
                <div class="flex p-2 lg:px-12">
                    <img src="{{ asset('images/ads.png') }}" alt="ads" class="block w-full h-24 md:w-1/2 md:mr-2 lg:rounded-xl lg:h-32 lg:mr-6 lg:border-2 lg:border-white">
                    <img src="{{ asset('images/ads.png') }}" alt="ads" class="hidden w-full h-24 md:block md:w-1/2 lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
                </div>

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
                <div class="bg-white rounded-lg mb-4 md:rounded-2xl md:mb-6 lg:border-2 lg:border-dashed">
                    <!-- List item name -->
                    <div class="flex justify-center p-3 mb-2">
                        <div class="w-full h-3 text-center border-b-3 border-teal-dark">
                            <h3 class="inline text-xl text-teal-dark px-2 bg-white font-bold">
                                {{ $model->name }}
                            </h3>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row">
                        <!-- List item image -->
                        <div class="md:self-end md:w-2/5">
                            <img src="" alt="" class="block w-full h-48 md:rounded-bl-2xl md:rounded-tr-2xl" style="object-fit: cover; object-position: top">
                        </div>

                        <div class="pt-3 px-4 pb-1 md:w-3/5 md:flex md:flex-wrap md:relative">
                            <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pb-3 md:pr-1 md:items-start">
                                <div class="mr-3 md:w-1/4 md:mr-1">
                                    <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="w-4/5 md:w-3/4">
                                    <strong>{{ $model->reservoir->name }}. </strong>{{ $model->location }}
                                </div>
                            </div>

                            <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:pb-3 md:pl-3 md:items-start">
                                <div class="mr-3 md:w-1/4 md:mr-1">
                                    <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="w-4/5 md:w-3/4">
                                    {{ $model->contacts }}
                                </div>
                            </div>

                            <div class="flex border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                                <div class="mr-3 md:w-1/4 md:mr-1">
                                    <img src="/images/icons/list.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="w-4/5 md:w-3/4">
                                    @foreach ($model->features->where('category', \App\Feature::CATEGORY_FACILITIES) as $feature)
                                        {{ $feature->name }}
                                        {{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                                <div class="mr-3 md:w-1/4 md:mr-1">
                                    <img src="/images/icons/walker.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="w-4/5 md:w-3/4">
                                    @foreach ($model->features->where('category', \App\Feature::CATEGORY_LEASURES) as $feature)
                                        {{ $feature->name }}
                                        {{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                                <div class="mr-3 md:w-1/4 md:mr-1">
                                    <img src="/images/icons/pencil.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="w-4/5 md:w-3/4">
                                    {!! $model->description !!}
                                </div>
                            </div>

                            @foreach ($model->accomodations as $accomodation)
                            <div class="flex border-teal-dark py-2 md:w-1/2 md:pr-2 md:items-start">
                                <div class="mr-3 md:w-1/4 md:mr-1">
                                    <img src="/images/icons/accomodation.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="w-4/5 md:w-3/4">
                                    <strong class="font-semibold">{{ $accomodation->guest_count }}-и местные домики,</strong>

                                    @foreach ($accomodation->features as $feature)
                                        {{ $feature->name }}
                                        {{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                                <div class="mr-3 md:w-1/4 md:mr-1">
                                    <img src="/images/icons/price.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="w-4/5 md:w-3/4">
                                    стоимость поживания от: {{ $accomodation->price_per_day }} тг в сутки
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
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
