@extends ('admin.layouts.master')

@section ('title', 'Реклама')

@section ('content')
    <div class="container mx-auto py-6">
        <div class="text-center text-red-light font-bold bg-white shadow mb-6 py-1">
            Для нормальной работы отключите блокировку рекламы на этой странице!
        </div>

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
