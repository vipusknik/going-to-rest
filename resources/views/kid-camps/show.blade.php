@extends('master')

@section('title', $model->name)

@section('header')
    <!-- Header -->
    <div class="bg-yellow-light lg:hidden">
        <div class="container mx-auto">
            <sm-md-nav title="Детский отдых" back-url="{{ route('kid-camps.index') }}"></sm-md-nav>
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
    <!-- Decoration (left) -->
    <div class="hidden lg:block lg:absolute kid-camps-decorations-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

    <div class="container mx-auto lg:px-20">
        <main class="lg:px-20">
            @if (request()->search === '1')
                @include ('partials.search-input')
            @else
                <!-- Page heading -->
                <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:text-center lg:font-hairline lg:mb-6">
                    Детский отдых
                </h1>
            @endif

            <div class="px-2 lg:px-0">
                <div class="flex flex-col bg-white rounded-lg mb-4 md:rounded-2xl md:pb-6 md:mb-6 lg:border-2 lg:border-dashed">
                    @if (request()->search === '1')
                        <model-category title="детский отдых"
                                        image="/images/icons/site-category-icons/children-holidays.png"
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
                                        {{ $model->location }}
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

                                {{-- Site and social media links for md and bigger devices --}}
                                <div class="hidden md:flex md:flex-col md:w-full md:py-4 md:border-b-2 md:border-teal-dark md:border-dotted">
                                    <div class="md:flex md:flex-wrap">
                                        @if ($model->site_link)
                                            <div class="flex md:w-1/2 md:items-center pr-2 mb-4">
                                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                                    <a href="{{ $model->site_link }}" target="_blank">
                                                        <img src="/images/icons/www.png" alt="address" class="block">
                                                    </a>
                                                </div>

                                                <div class="flex-1 break-words min-w-0">
                                                    <a href="{{ $model->site_link }}" target="_blank" class="block text-black">{{ base_url($model->site_link) }}</a>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($model->socialMedia()->instagram)
                                            <div class="flex md:w-1/2 md:items-center pr-2 mb-4">
                                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                                    <a href="{{ $model->socialMedia()->instagram }}" target="_blank">
                                                        <img src="/images/icons/instagram.png" alt="address" class="block">
                                                    </a>
                                                </div>

                                                <div class="flex-1 break-words min-w-0">
                                                    <a href="{{ $model->socialMedia()->instagram }}" target="_blank" class="block text-black">{{ base_url($model->socialMedia()->instagram) }}</a>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($model->socialMedia()->facebook)
                                            <div class="flex md:w-1/2 md:items-center pr-2 mb-4">
                                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                                    <a href="{{ $model->socialMedia()->facebook }}" target="_blank">
                                                        <img src="/images/icons/facebook.png" alt="address" class="block">
                                                    </a>
                                                </div>

                                                <div class="flex-1 break-words min-w-0">
                                                    <a href="{{ $model->socialMedia()->facebook }}" target="_blank" class="block text-black">{{ base_url($model->socialMedia()->facebook) }}</a>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($model->socialMedia()->vk)
                                            <div class="flex md:w-1/2 md:items-center pr-2 mb-4">
                                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                                    <a href="{{ $model->socialMedia()->vk }}" target="_blank">
                                                        <img src="/images/icons/vk.png" alt="address" class="block">
                                                    </a>
                                                </div>

                                                <div class="flex-1 break-words min-w-0">
                                                    <a href="{{ $model->socialMedia()->vk }}" target="_blank" class="block text-black">{{ base_url($model->socialMedia()->vk) }}</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex border-b border-dotted border-teal-dark py-2 md:border-b-2 md:items-start">
                                    <div class="w-8 h-8 flex-no-shrink mr-3">
                                        <img src="/images/icons/list.png" alt="address" class="block">
                                    </div>

                                    <div class="flex-1 break-words min-w-0">
                                        @foreach ($model->features->where('category', \App\Feature::CATEGORY_OCCUPATIONS) as $feature)
                                            {{ $feature->name }}{{ !$loop->last ? ',' : '' }}
                                        @endforeach
                                    </div>
                                </div>

                                @include ('partials.links-sm')

                                <div class="md:hidden">
                                    @if ($model->description)
                                        <div class="flex border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                                            <div class="w-8 h-8 flex-no-shrink mr-3">
                                                <img src="/images/icons/pencil.png" alt="address" class="block w-8 h-8">
                                            </div>

                                            <div class="flex-1 break-words min-w-0">
                                                {!! $model->description !!}
                                            </div>
                                        </div>
                                    @endif

                                    <div class="flex border-teal-dark py-2 md:w-1/2 md:pr-2 md:items-start">
                                        <div class="w-8 h-8 flex-no-shrink mr-3">
                                            <img src="/images/icons/accomodation.png" alt="address" class="block w-8 h-8">
                                        </div>

                                        <div class="flex-1 break-words min-w-0">
                                            {!! $model->accomodation !!}
                                        </div>
                                    </div>

                                    <div class="flex border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                                        <div class="w-8 h-8 flex-no-shrink mr-3">
                                            <img src="/images/icons/price.png" alt="address" class="block w-8 h-8">
                                        </div>

                                        <div class="flex-1 break-words min-w-0">
                                            @if ($model->cost == '0')
                                                цена договорная
                                            @else
                                                от {{ $model->cost }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hidden md:block md:px-3 md:mt-3">
                            @if ($model->description)
                                <div class="flex pb-3 border-b-2 border-teal-dark border-dotted">
                                    <div class="w-8 h-8 flex-no-shrink mr-3">
                                        <img src="/images/icons/pencil.png" alt="" class="block w-full h-full">
                                    </div>

                                    <div class="flex-1 break-words min-w-0">
                                        {!! $model->description !!}
                                    </div>
                                </div>
                            @endif

                            <div class="flex">
                                <div class="w-8 h-8 flex-no-shrink mr-3 mt-1">
                                    <img src="/images/icons/accomodation.png" alt="" class="block w-full h-full">
                                </div>

                                <div class="flex-1 break-words min-w-0 flex p-1">
                                    <div class="w-3/5 border-r-2 border-teal-dark border-dotted">
                                        <div>
                                            {!! $model->accomodation !!}
                                        </div>
                                    </div>

                                    <div class="flex w-2/5">
                                        <div class="w-8 h-8 flex-no-shrink mr-3 ml-2">
                                            <img src="/images/icons/price.png" alt="" class="block w-full h-full">
                                        </div>

                                        <div class="flex-1 break-words min-w-0">
                                            <div class="pr-1">
                                                @if ($model->cost == '0')
                                                    цена договорная
                                                @else
                                                    от {{ $model->cost }}
                                                @endif
                                            </div>
                                        </div>
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
