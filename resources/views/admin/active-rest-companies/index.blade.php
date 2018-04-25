@extends ('admin.layouts.master')

@section ('title', 'Активный отдых')

@section ('content')
    <div>
        <active-rest-companies-app :companies-initial="{{ json_encode($companies) }}"></active-rest-companies-app>
    </div>
@endsection
