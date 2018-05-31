@extends('master')

@section('title')
    {{ $model->name }}
@endsection

@section('header')
   <!-- Header -->
    <div class="bg-yellow-light lg:hidden">
        <div class="container mx-auto">
            <rest-centers-search :show-dropdown-button="false" :reservoirs="{{ json_encode($reservoirs) }}" @resultsupdated="updateModels"></rest-centers-search>
        </div>
    </div>

    <!-- Ads -->
    <div class="mb-2">
        <div class="container mx-auto">
            <div class="relative">

                <!-- Ads -->
                <div class="flex p-2 lg:px-12">
                    <img src="{{ asset('images/ads.png') }}" alt="ads" class="block w-full h-24 md:w-1/2 md:mr-2 lg:rounded-xl lg:h-32 lg:mr-6 lg:border-2 lg:border-white">
                    <img src="{{ asset('images/ads.png') }}" alt="ads" class="hidden w-full h-24 md:block md:w-1/2 lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
                </div>
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

            <div class="px-2 lg:px-0">
                <div class="bg-white rounded-lg mb-4 md:rounded-2xl md:pb-6 md:mb-6 lg:border-2 lg:border-dashed">
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
                        <div class="mb-8 md:w-2/5 md:mb-0">
                            <carousel>
                                @foreach ($model->media as $image)
                                    <img src="{{ str_replace('http://localhost', 'http://otdyh-vko.kz', $image->getUrl()) }}"
                                         class="carousel-cell md:rounded-tr-2xl md:rounded-bl-2xl">
                                @endforeach

                                <template slot="nav">
                                    @foreach ($model->media as $image)
                                        <img src="{{ str_replace('http://localhost', 'http://otdyh-vko.kz', $image->getUrl()) }}" class="mr-2 rounded-sm">
                                    @endforeach
                                </template>
                            </carousel>
                        </div>

                        <div class="pt-3 px-4 pb-1 md:w-3/5 md:flex md:flex-wrap md:relative">
                            <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pb-3 md:pr-1 md:items-start">
                                <div class="w-8 h-8 mr-3">
                                    <img src="/images/icons/location.png" alt="address" class="block">
                                </div>

                                <div class="flex-1">
                                    <strong>{{ $model->reservoir->name }}. </strong>{{ $model->location }}
                                </div>
                            </div>

                            <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:pb-3 md:pl-3 md:items-start">
                                <div class="w-8 h-8 mr-3">
                                    <img src="/images/icons/contacts.png" alt="address" class="block">
                                </div>

                                <div class="flex-1">
                                    {{ $model->contacts }}
                                    <div>{{ $model->email }}</div>
                                </div>
                            </div>

                            <div class="flex border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pr-2 md:items-start">
                                <div class="w-8 h-8 mr-3">
                                    <img src="/images/icons/list.png" alt="address" class="block">
                                </div>

                                <div class="flex-1">
                                    @foreach ($model->features->where('category', \App\Feature::CATEGORY_FACILITIES) as $feature)
                                        {{ $feature->name }}
                                        {{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex border-b border-dotted border-teal-dark py-2 md:w-1/2 md:pl-3 md:border-b-2 md:items-start">
                                <div class="w-8 h-8 mr-3">
                                    <img src="/images/icons/walker.png" alt="address" class="block">
                                </div>

                                <div class="flex-1">
                                    @foreach ($model->features->where('category', \App\Feature::CATEGORY_LEASURES) as $feature)
                                        {{ $feature->name }}
                                        {{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </div>
                            </div>

                            @include ('partials.links-sm')

                            <div class="md:hidden">
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

                                <div class="flex border-dotted {{ !$loop->last ? 'border-b': '' }} border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                                    <div class="mr-3 md:w-1/4 md:mr-1">
                                        <img src="/images/icons/price.png" alt="address" class="block w-8 h-8">
                                    </div>

                                    <div class="w-4/5 md:w-3/4">
                                        от {{ $accomodation->price_per_day }} тг в сутки
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @include ('partials.links-md')

                    <div class="hidden md:block md:px-3 md:mt-3">
                        <div class="flex">
                            <div class="h-8 w-8 mt-1 mr-4">
                                <img src="/images/icons/pencil.png" alt="" class="block w-full h-full">
                            </div>

                            <div class="flex-1 pb-3 border-b-2 border-teal-dark border-dotted">
                                {!! $model->description !!}
                            </div>
                        </div>

                        @foreach ($model->accomodations as $accomodation)
                        <div class="flex">
                            <div class="h-8 w-8 mt-1 mr-4">
                                <img src="/images/icons/accomodation.png" alt="" class="block w-full h-full">
                            </div>

                            <div class="flex-1 flex p-1 border-b-2 border-teal-dark border-dotted">
                                <div class="w-3/4 border-r-2 border-teal-dark border-dotted">
                                    <div>
                                        <strong class="font-semibold">{{ $accomodation->guest_count }}-и местные домики,</strong>

                                        @foreach ($accomodation->features as $feature)
                                            {{ $feature->name }}
                                            {{ !$loop->last ? ',' : '' }}
                                        @endforeach
                                    </div>
                                </div>

                                <div class="flex w-1/4">
                                    <div class="h-8 w-8 mt-1 ml-2 mr-4">
                                        <img src="/images/icons/price.png" alt="" class="block w-full h-full">
                                    </div>

                                    <div class="flex-1">
                                        <div class="pr-1">от {{ $accomodation->price_per_day }} тг в сутки</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
