@extends ('admin.layouts.master')

@section ('title', 'Охота и рыбалка')

@section ('content')
    <div>
        <hunting-companies-app :models-initial="{{ json_encode($models) }}" endpoint="/admin/hunting-companies">
        </hunting-companies-app>
    </div>
@endsection
