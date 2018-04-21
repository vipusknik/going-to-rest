@extends ('admin.layouts.master')

@section ('title', 'Базы отдыха')

@section ('content')
    <div>
        <rest-centers-app :rest-centers-initial="{{ json_encode($restCenters) }}" :reservoirs="{{ $reservoirs }}">
        </rest-centers-app>
    </div>
@endsection
