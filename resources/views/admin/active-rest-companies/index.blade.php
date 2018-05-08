@extends ('admin.layouts.master')

@section ('title', 'Активный отдых')

@section ('content')
    <div>
        <active-rest-companies-app :models-initial="{{ json_encode($companies) }}" endpoint="/admin/active-rest-companies">
        </active-rest-companies-app>
    </div>
@endsection
