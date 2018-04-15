@extends ('admin.layouts.master')

@section ('title', 'Медицинский туризм')

@section ('head')
    <link rel="stylesheet" href="{{ asset('css/bulma.switch.min.css') }}">
@endsection

@section ('content')
    <div>
        <medical-centers-app :medical-centers-initial="{{ json_encode($medicalCenters) }}" :features="{{ $features }}">
        </medical-centers-app>
    </div>
@endsection
