@extends ('admin.layouts.master')

@section ('title', 'Базы отдыха')

@section ('content')
    <div>
        <rest-centers-app :models-initial="{{ json_encode($restCenters) }}" endpoint="/admin/rest-centers">
        </rest-centers-app>
    </div>
@endsection
