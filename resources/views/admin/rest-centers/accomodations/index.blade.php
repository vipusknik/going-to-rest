@extends ('admin.layouts.master')

@section ('title', "Размещения для $restCenter->name")

@section ('content')
    <div class="container mx-auto mt-3">
        <rest-center-accomodations-app :rest-center="{{ json_encode($restCenter) }}"
                                       :features="{{ json_encode($features) }}"
                                       csrf="{{ csrf_token() }}">
        </rest-center-accomodations-app>
    </div>
@endsection

