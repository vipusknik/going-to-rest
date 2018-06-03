@extends ('admin.layouts.master')

@section ('title', 'Реклама')

@section ('content')
    <div class="container mx-auto py-6">
        @foreach ($categories as $category => $title)
            <div class="mb-8">
                <banners-widget title="{{ $title }}"
                                category="{{ $category }}"
                               :banners-initial="{{ json_encode($banners[$category] ?? []) }}">
                </banners-widget>
            </div>
        @endforeach
    </div>
@endsection
