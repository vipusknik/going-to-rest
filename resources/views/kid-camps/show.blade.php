@extends('master')

@section('title')
    {{ $model->name }}
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
    <!-- Decoration (left) -->
    <div class="hidden lg:block lg:absolute kid-camps-decorations-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

    <div class="container mx-auto lg:px-20">
        <main class="lg:px-20">

            <!-- Page heading -->
            <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:text-center lg:font-hairline lg:mb-6">
                Детский отдых
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
                                    {{ $model->location }}
                                </div>
                            </div>

                            <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:pb-3 md:pl-3 md:items-start">
                                <div class="w-8 h-8 mr-3">
                                    <img src="/images/icons/contacts.png" alt="address" class="block">
                                </div>

                                <div class="flex-1">
                                    {{ $model->contacts }}
                                </div>
                            </div>

                            {{-- Site and social media links for md and bigger devices --}}
                            <div class="hidden md:flex md:flex-col md:w-full md:py-4 md:border-b-2 md:border-teal-dark md:border-dotted">
                                <div class="md:flex md:mb-3">
                                    <div class="flex md:w-1/2 md:items-center">
                                        <div class="w-8 h-8 mr-3">
                                            <a href="{{ $model->site_link }}">
                                                <img src="/images/icons/www.png" alt="address" class="block">
                                            </a>
                                        </div>

                                        <div class="flex-1">
                                            <a href="{{ $model->site_link }}" class="block text-black">{{ base_url($model->site_link) }}</a>
                                        </div>
                                    </div>

                                    <div class="flex md:w-1/2 md:items-center">
                                        <div class="w-8 h-8 mr-3">
                                            <a href="{{ $model->socialMedia()->instagram }}">
                                                <img src="/images/icons/instagram.png" alt="address" class="block">
                                            </a>
                                        </div>

                                        <div class="flex-1">
                                            <a href="{{ $model->socialMedia()->instagram }}" class="block text-black">{{ base_url($model->socialMedia()->instagram) }}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="md:flex">
                                    <div class="flex md:w-1/2 md:items-center">
                                        <div class="w-8 h-8 mr-3">
                                            <a href="{{ $model->socialMedia()->facebook }}">
                                                <img src="/images/icons/facebook.png" alt="address" class="block">
                                            </a>
                                        </div>

                                        <div class="flex-1">
                                            <a href="{{ $model->socialMedia()->facebook }}" class="block text-black">{{ base_url($model->socialMedia()->facebook) }}</a>
                                        </div>
                                    </div>

                                    <div class="flex md:w-1/2 md:items-center">
                                        <div class="w-8 h-8 mr-3">
                                            <a href="{{ $model->socialMedia()->vk }}">
                                                <img src="/images/icons/vk.png" alt="address" class="block">
                                            </a>
                                        </div>

                                        <div class="flex-1">
                                            <a href="{{ $model->socialMedia()->vk }}" class="block text-black">{{ base_url($model->socialMedia()->vk) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex border-b border-dotted border-teal-dark py-2 md:border-b-2 md:items-start">
                                <div class="w-8 h-8 mr-3">
                                    <img src="/images/icons/list.png" alt="address" class="block">
                                </div>

                                <div class="flex-1">
                                    @foreach ($model->features->where('category', \App\Feature::CATEGORY_OCCUPATIONS) as $feature)
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

                                <div class="flex border-teal-dark py-2 md:w-1/2 md:pr-2 md:items-start">
                                    <div class="mr-3 md:w-1/4 md:mr-1">
                                        <img src="/images/icons/accomodation.png" alt="address" class="block w-8 h-8">
                                    </div>

                                    <div class="w-4/5 md:w-3/4">
                                        {!! $model->accomodation !!}
                                    </div>
                                </div>

                                <div class="flex border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                                    <div class="mr-3 md:w-1/4 md:mr-1">
                                        <img src="/images/icons/price.png" alt="address" class="block w-8 h-8">
                                    </div>

                                    <div class="w-4/5 md:w-3/4">
                                        стоимость путевки от: {{ $model->cost }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden md:block md:px-3 md:mt-3">
                        <div class="flex pb-3 border-b-2 border-teal-dark border-dotted">
                            <div class="h-8 w-8 mt-1 mr-4">
                                <img src="/images/icons/pencil.png" alt="" class="block w-full h-full">
                            </div>

                            <div class="flex-1">
                                {!! $model->description !!}
                            </div>
                        </div>

                        <div class="flex">
                            <div class="h-8 w-8 mt-1 mr-4">
                                <img src="/images/icons/accomodation.png" alt="" class="block w-full h-full">
                            </div>

                            <div class="flex-1 flex p-1">
                                <div class="w-3/5 border-r-2 border-teal-dark border-dotted">
                                    <div>
                                        {!! $model->accomodation !!}
                                    </div>
                                </div>

                                <div class="flex w-2/5">
                                    <div class="h-8 w-8 mt-1 ml-2 mr-4">
                                        <img src="/images/icons/price.png" alt="" class="block w-full h-full">
                                    </div>

                                    <div class="flex-1">
                                        <div class="pr-1">стоимость путевки от: {{ $model->cost }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Decoration (right) -->
    <div class="hidden lg:block lg:absolute kid-camps-decoraions-right lg:pin-t lg:pin-r"></div>
@endsection
