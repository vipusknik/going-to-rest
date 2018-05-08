@extends ('admin.layouts.master')

@section ('title', 'Медицинский туризм')

@section ('content')
    <div>
        <medical-centers-app :models-initial="{{ json_encode($medicalCenters) }}" endpoint="/admin/medical-centers">
        </medical-centers-app>
    </div>
@endsection
