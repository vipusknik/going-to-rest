@extends ('admin.layouts.master')

@section ('title', 'Детский отдых')

@section ('content')
    <div>
        <kid-camps-app :kid-camps-initial="{{ json_encode($kidCamps) }}"></kid-camps-app>
    </div>
@endsection
