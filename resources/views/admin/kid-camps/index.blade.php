@extends ('admin.layouts.master')

@section ('title', 'Детский отдых')

@section ('head')
    <link rel="stylesheet" href="{{ asset('css/bulma.switch.min.css') }}">
@endsection

@section ('content')
    <div>
        <kid-camps-app :kid-camps-initial="{{ json_encode($kidCamps) }}"></kid-camps-app>
    </div>
@endsection
