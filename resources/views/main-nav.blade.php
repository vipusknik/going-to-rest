<!-- Main menu for large and xl devices -->
<div class="container mx-auto lg:px-12">
    <nav class="hidden lg:block lg:flex lg:justify-around">
        <div class="px-4 py-1 bg-white rounded hover:opacity-100 {{ Route::is('rest-centers.index') ? 'opacity-100' : 'opacity-50' }}">
            <a href="{{ route('rest-centers.index') }}" class="lg:text-base xl:text-lg text-black">пляжный отдых</a>
        </div>

        <div class="px-4 py-1 bg-white rounded hover:opacity-100 {{ Route::is('active-rest-companies.index') ? 'opacity-100' : 'opacity-50' }}">
            <a href="{{ route('active-rest-companies.index') }}" class="lg:text-base xl:text-lg text-black">активный отдых</a>
        </div>

        <div class="px-4 py-1 bg-white rounded hover:opacity-100 {{ Route::is('kid-camps.index') ? 'opacity-100' : 'opacity-50' }}">
            <a href="{{ route('kid-camps.index') }}" class="lg:text-base xl:text-lg text-black">детский отдых</a>
        </div>

        <div class="px-4 py-1 bg-white rounded hover:opacity-100 {{ Route::is('hunting-companies.index') ? 'opacity-100' : 'opacity-50' }}">
            <a href="{{ route('hunting-companies.index') }}" class="lg:text-base xl:text-lg text-black">рыбалка и охота</a>
        </div>

        <div class="px-4 py-1 bg-white rounded hover:opacity-100 {{ Route::is('medical-centers.index') ? 'opacity-100' : 'opacity-50' }}">
            <a href="{{ route('medical-centers.index') }}" class="lg:text-base xl:text-lg text-black">медицинский туризм</a>
        </div>
    </nav>
</div>
