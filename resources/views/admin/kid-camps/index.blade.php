@extends ('admin.layouts.master')

@section ('title', 'Детский отдых')

@section ('content')
    <div>
        <kid-camps-app :models-initial="{{ json_encode($kidCamps) }}" endpoint="/admin/kid-camps"></kid-camps-app>
    </div>
@endsection
