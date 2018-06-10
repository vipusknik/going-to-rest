@extends('master')

@section('title')
    {{ $model->name }}
@endsection

@section('header')
   <!-- Header -->
    <div class="bg-yellow-light lg:hidden">
        <div class="container mx-auto">
            <sm-md-nav title="Медицинский туризм" back-url="{{ route('medical-centers.index') }}"></sm-md-nav>
        </div>
    </div>

    <!-- Ads -->
    <div class="mb-2">
        <div class="container mx-auto">
            <div class="relative">
                @include('partials.banners')
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Decoration (left) -->
    <div class="hidden lg:block lg:absolute medical-centers-decorations-left lg:pin-t lg:mt-6 lg:pin-l xl:mt-3"></div>

    <div class="container mx-auto lg:px-20">
        <main class="lg:px-20">

            <!-- Page heading -->
            <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:text-center lg:font-hairline lg:mb-6">
                Медицинский туризм
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

                            <div class="flex border-b border-dotted border-teal-dark py-2 md:border-b-2 md:items-start">
                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                    <img src="/images/icons/list.png" alt="address" class="block">
                                </div>

                                <div class="flex-1 break-words min-w-0">
                                    @foreach ($model->features->where('category', \App\Feature::CATEGORY_PROCEDURES) as $feature)
                                        {{ $feature->name }}{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex border-b border-dotted border-teal-dark py-2 md:border-b-2 md:items-start">
                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                    <img src="/images/icons/medicine.png" alt="address" class="block">
                                </div>

                                <div class="flex-1 break-words min-w-0">
                                    @foreach ($model->features->where('category', \App\Feature::CATEGORY_TREATMENT_TYPES) as $feature)
                                        {{ $feature->name }}{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </div>
                            </div>

                            @include ('partials.links-sm')

                            @if ($model->description)
                                <div class="md:hidden">
                                    <div class="flex py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                                        <div class="w-8 h-8 flex-no-shrink mr-3">
                                            <img src="/images/icons/pencil.png" alt="address" class="block w-8 h-8">
                                        </div>

                                        <div class="flex-1 break-words min-w-0">
                                            {!! $model->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    @include ('partials.links-md')

                    @if ($model->description)
                        <div class="hidden md:block md:px-3 md:mt-3">
                            <div class="flex">
                                <div class="w-8 h-8 flex-no-shrink mr-3 mt-1">
                                    <img src="/images/icons/pencil.png" alt="" class="block w-full h-full">
                                </div>

                                <div class="flex-1 break-words min-w-0 pb-3">
                                    {!! $model->description !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <!-- Decoration (right) -->
    <div class="hidden lg:block lg:absolute medical-centers-decorations-right lg:pin-t lg:pin-r"></div>
@endsection
