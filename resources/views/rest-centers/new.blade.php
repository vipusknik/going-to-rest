@extends('master')

@section('title')
   NO Пляжный отдых
@endsection

@section('header')

@endsection

@section('content')

    <models-page inline-template :models-initial="{{ json_encode($models) }}">
        <div class="container mx-auto lg:px-20">
            <main class="lg:px-20">
                <!-- Page heading -->
                <h1 class="hidden font-hortensia lg:block lg:text-4xl lg:text-grey-darkest lg:text-center lg:font-hairline lg:mb-6">
                    Пляжный отдых
                </h1>
([  'social_media', 'features', 'media', 'accomodations', 'accomodations.features' ])
                <!-- Search for large devices -->
                <portal-target name="lg-xl-rest-centers-search" slim></portal-target>

                <!-- List -->
               <div class="px-2 lg:px-0">
                    <rest-center v-for="model in models" :key="model.id" :model="model"></rest-center>
                </div>
                               
                <div>
                </div>
            </main>
        </div>
    </models-page>

@endsection



