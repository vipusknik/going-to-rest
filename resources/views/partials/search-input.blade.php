{{-- Search input --}}
<form action="/search" method="GET" class="flex items-center h-10 mb-8 px-2 lg:px-0">
    <input type="text" name="q" value="{{ request()->q }}" placeholder="Введите название" class="block flex-1 h-full text-lg py-2 px-4 rounded-l-xl">
    <button class="w-16 h-full p-2 text-white font-bold tracking-wide bg-teal-dark rounded-r-xl hover:bg-teal md:w-24">Поиск</button>
</form>
