@extends ('admin.layouts.master')

@section ('title', 'Медицинский туризм')

@section ('head')
    <link rel="stylesheet" href="{{ asset('css/bulma.switch.min.css') }}">
@endsection

@section ('content')
    <div>
        {{-- <rest-centers-app :rest-centers-initial="{{ json_encode($restCenters) }}" :reservoirs="{{ $reservoirs }}">
        </rest-centers-app> --}}
    </div>
@endsection
