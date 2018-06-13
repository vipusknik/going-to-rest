@extends('master')

@section('title', $model->name)

@section('header')
    <!-- Header -->
    <div class="bg-yellow-light lg:hidden">
        <div class="container mx-auto">
            <sm-md-nav title="Рыбалка и охота" back-url="{{ route('hunting-companies.index') }}"></sm-md-nav>
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
        <hunting-company-page :model="{{ json_encode($model) }}" inline-template>
            <main class="lg:px-20">
                @if (request()->search === '1')
                    @include ('partials.search-input')
                @else
                    <!-- Page heading -->
                    <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:text-center lg:font-hairline lg:mb-6">
                        Рыбалка и охота
                    </h1>
                @endif

                <div class="px-2 lg:px-0">
                    <div class="flex flex-col bg-white rounded-lg mb-4 md:rounded-2xl md:pb-6 md:mb-6 lg:border-2 lg:border-dashed">
                        @if (request()->search === '1')
                            <model-category title="охота и рыбалка"
                                            image="/images/icons/site-category-icons/fishing-and-hunting.png"
                                           :lg-flex-direction-row="true">
                            </model-category>
                        @endif

                        <div>
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
                                            <img src="{{ $image->getLink() }}"
                                                 class="carousel-cell md:rounded-tr-2xl md:rounded-bl-2xl">
                                        @endforeach

                                        <template slot="nav">
                                            @foreach ($model->media as $image)
                                                <img src="{{ $image->getLink() }}" class="mr-2 rounded-sm">
                                            @endforeach
                                        </template>
                                    </carousel>
                                </div>

                                <div class="pt-3 px-4 pb-1 md:w-3/5 md:flex md:flex-wrap md:relative">
                                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pb-3 md:pr-1 md:items-start">
                                        <div class="w-8 h-8 flex-no-shrink mr-3">
                                            <img src="/images/icons/location.png" alt="address" class="block">
                                        </div>

                                        <div class="flex-1 break-words min-w-0">
                                            @if ($model->region)
                                                р-н. {{ $model->region->name }},
                                            @endif

                                            @if ($model->place)
                                                {{ $model->place }}
                                            @endif
                                        </div>
                                    </div>

                                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:pb-3 md:pl-3 md:items-start">
                                        <div class="w-8 h-8 flex-no-shrink mr-3">
                                            <img src="/images/icons/contacts.png" alt="address" class="block">
                                        </div>

                                        <div class="flex-1 break-words min-w-0">
                                            {{ $model->contacts }}
                                            <div>{{ $model->email }}</div>
                                        </div>
                                    </div>

                                    <div class="flex items-center border-b border-dotted border-teal-dark pt-2 md:hidden">
                                        <div v-if="hasAnimalsAt('summer')" @click="selectedSeason = 'summer'" :class="{ 'px-2': selectedSeason !== 'summer' }" class="flex items-center p-1 mr-3 rounded-t-lg bg-yellow cursor-pointer">
                                            <div class="w-6 h-6">
                                                <img src="/images/icons/summer-white.png" alt="" class="block">
                                            </div>

                                            <div v-if="selectedSeason == 'summer'" class="w-10 ml-2 text-white font-bold uppercase">
                                                лето
                                            </div>
                                        </div>

                                        <div v-if="hasAnimalsAt('spring')" @click="selectedSeason = 'spring'" :class="{ 'px-2': selectedSeason !== 'spring' }" class="flex items-center p-1 mr-3 rounded-t-lg bg-olive cursor-pointer">
                                            <div class="w-6 h-6">
                                                <img src="/images/icons/spring-white.png" alt="" class="block">
                                            </div>

                                            <div v-if="selectedSeason == 'spring'" class="w-12 ml-2 text-white font-bold uppercase">
                                                весна
                                            </div>
                                        </div>

                                        <div v-if="hasAnimalsAt('autumn')" @click="selectedSeason = 'autumn'" :class="{ 'px-2': selectedSeason !== 'autumn' }" class="flex items-center p-1 mr-3 rounded-t-lg bg-red-autumn cursor-pointer">
                                            <div class="w-6 h-6">
                                                <img src="/images/icons/autumn-white.png" alt="" class="block">
                                            </div>

                                            <div v-if="selectedSeason == 'autumn'" class="w-12 ml-2 text-white font-bold uppercase">
                                                осень
                                            </div>
                                        </div>

                                        <div v-if="hasAnimalsAt('winter')" @click="selectedSeason = 'winter'" :class="{ 'px-2': selectedSeason !== 'winter' }" class="flex items-center p-1 rounded-t-lg bg-teal cursor-pointer">
                                            <div class="w-6 h-6">
                                                <img src="/images/icons/winter-white.png" alt="" class="block h-6">
                                            </div>

                                            <div v-if="selectedSeason == 'winter'" class="w-12 ml-2 text-white font-bold uppercase">
                                                зима
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col border-b border-dotted border-teal-dark pt-3 smd:px-2 md:border-b-2 md:hidden">
                                        <div v-if="animals.length" class="flex items-center mb-2">
                                            <div class="flex items-center mb-3">
                                                <div class="w-8 h-8 mr-2">
                                                    <img src="/images/icons/bird.png" alt="" class="block">
                                                </div>

                                                <div class="flex-1">
                                                    <span v-for="(animal, index) in animals">
                                                        @{{ animal.name }}<template v-if="index !== animals.length - 1">, </template>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div v-if="fishes.length" class="flex items-center">
                                            <div class="flex items-center mb-3">
                                                <div class="w-8 h-8 mr-2">
                                                    <img src="/images/icons/fish.png" alt="" class="block">
                                                </div>

                                                <div class="flex-1">
                                                    <span v-for="(fish, index) in fishes">
                                                        @{{ fish.name }}<template v-if="index !== fishes.length - 1">, </template>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Site and social media links for md and bigger devices --}}
                                    <div class="hidden md:flex md:flex-col md:w-full md:py-4 md:border-b-2 md:border-teal-dark md:border-dotted">
                                        <div class="md:flex md:mb-3">
                                            <div class="flex md:w-1/2 md:items-center">
                                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                                    <a href="{{ $model->site_link }}">
                                                        <img src="/images/icons/www.png" alt="address" class="block">
                                                    </a>
                                                </div>

                                                <div class="flex-1 break-words min-w-0">
                                                    <a href="{{ $model->site_link }}" class="block text-black">{{ base_url($model->site_link) }}</a>
                                                </div>
                                            </div>

                                            <div class="flex md:w-1/2 md:items-center">
                                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                                    <a href="{{ $model->socialMedia()->instagram }}">
                                                        <img src="/images/icons/instagram.png" alt="address" class="block">
                                                    </a>
                                                </div>

                                                <div class="flex-1 break-words min-w-0">
                                                    <a href="{{ $model->socialMedia()->instagram }}" class="block text-black">{{ base_url($model->socialMedia()->instagram) }}</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="md:flex">
                                            <div class="flex md:w-1/2 md:items-center">
                                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                                    <a href="{{ $model->socialMedia()->facebook }}">
                                                        <img src="/images/icons/facebook.png" alt="address" class="block">
                                                    </a>
                                                </div>

                                                <div class="flex-1 break-words min-w-0">
                                                    <a href="{{ $model->socialMedia()->facebook }}" class="block text-black">{{ base_url($model->socialMedia()->facebook) }}</a>
                                                </div>
                                            </div>

                                            <div class="flex md:w-1/2 md:items-center">
                                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                                    <a href="{{ $model->socialMedia()->vk }}">
                                                        <img src="/images/icons/vk.png" alt="address" class="block">
                                                    </a>
                                                </div>

                                                <div class="flex-1 break-words min-w-0">
                                                    <a href="{{ $model->socialMedia()->vk }}" class="block text-black">{{ base_url($model->socialMedia()->vk) }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden md:flex md:items-end md:w-full md:border-b-2 md:border-dotted md:border-teal-dark md:pt-3">
                                        <div v-if="hasAnimalsAt('summer')" @click="selectedSeason = 'summer'" :class="{ 'px-2': selectedSeason !== 'summer' }" class="flex items-center p-1 mr-3 rounded-t-lg bg-yellow cursor-pointer">
                                            <div class="w-6 h-6">
                                                <img src="/images/icons/summer-white.png" alt="" class="block">
                                            </div>

                                            <div v-if="selectedSeason == 'summer'" class="w-10 ml-2 text-white font-bold uppercase">
                                                лето
                                            </div>
                                        </div>

                                        <div v-if="hasAnimalsAt('spring')" @click="selectedSeason = 'spring'" :class="{ 'px-2': selectedSeason !== 'spring' }" class="flex items-center p-1 mr-3 rounded-t-lg bg-olive cursor-pointer">
                                            <div class="w-6 h-6">
                                                <img src="/images/icons/spring-white.png" alt="" class="block">
                                            </div>

                                            <div v-if="selectedSeason == 'spring'" class="w-12 ml-2 text-white font-bold uppercase">
                                                весна
                                            </div>
                                        </div>

                                        <div v-if="hasAnimalsAt('autumn')" @click="selectedSeason = 'autumn'" :class="{ 'px-2': selectedSeason !== 'autumn' }" class="flex items-center p-1 mr-3 rounded-t-lg bg-red-autumn cursor-pointer">
                                            <div class="w-6 h-6">
                                                <img src="/images/icons/autumn-white.png" alt="" class="block">
                                            </div>

                                            <div v-if="selectedSeason == 'autumn'" class="w-12 ml-2 text-white font-bold uppercase">
                                                осень
                                            </div>
                                        </div>

                                        <div v-if="hasAnimalsAt('winter')" @click="selectedSeason = 'winter'" :class="{ 'px-2': selectedSeason !== 'winter' }" class="flex items-center p-1 rounded-t-lg bg-teal cursor-pointer">
                                            <div class="w-6 h-6">
                                                <img src="/images/icons/winter-white.png" alt="" class="block h-6">
                                            </div>

                                            <div v-if="selectedSeason == 'winter'" class="w-12 ml-2 text-white font-bold uppercase">
                                                зима
                                            </div>
                                        </div>
                                    </div>

                                    @include ('partials.links-sm')
                                </div>
                            </div>

                            <div class="hidden md:flex md:border-b-2 md:border-dotted md:border-teal-dark md:pt-3 md:mx-2 md:md:border-b-2">
                                <div v-if="animals.length" class="flex items-center w-1/2 mr-2">
                                    <div class="flex items-center mb-3">
                                        <div class="w-8 h-8 mr-2">
                                            <img src="/images/icons/bird.png" alt="" class="block">
                                        </div>

                                        <div class="flex-1">
                                            <span v-for="(animal, index) in animals">
                                                @{{ animal.name }}<template v-if="index !== animals.length - 1">, </template>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="fishes.length" class="flex items-center w-1/2">
                                    <div class="flex items-center mb-3">
                                        <div class="w-8 h-8 mr-2">
                                            <img src="/images/icons/fish.png" alt="" class="block">
                                        </div>

                                        <div class="flex-1">
                                            <span v-for="(fish, index) in fishes">
                                                @{{ fish.name }}<template v-if="index !== fishes.length - 1">, </template>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($model->description)
                                <div class="flex px-3 mt-3 pb-3 md:hidden">
                                    <div class="w-8 h-8 flex-no-shrink mr-3">
                                        <img src="/images/icons/pencil.png" alt="" class="block w-full h-full">
                                    </div>

                                    <div class="flex-1 break-words min-w-0">
                                        {!! $model->description !!}
                                    </div>
                                </div>

                                <div class="hidden md:flex md:py-2 md:w-full md:pl-2 md:items-start">
                                    <div class="w-8 h-8 flex-no-shrink mr-3">
                                        <img src="/images/icons/pencil.png" alt="address" class="block">
                                    </div>

                                    <div class="flex-1 break-words min-w-0">
                                        {!! $model->description !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
        </hunting-company-page>
    </div>

    <!-- Decoration (right) -->
    <div class="hidden lg:block lg:absolute hunting-companies-decorations-right lg:pin-t lg:pin-r"></div>
@endsection
