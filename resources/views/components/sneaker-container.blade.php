@isset($sneaker)
<a href="/sneaker/{{ $sneaker->id }}" class="w-full h-64 py-2 border md:w-1/2 lg:w-1/3 xl:w-1/5 md:px-2 transition duration-100 ease-in-out hover:-translate-y-1 hover: scale-110">
    <h3 class="mb-4 font-medium">
        {{ $sneaker->name }}
    </h3>
</a>
@else
<div class="w-full h-64 py-2 border md:w-1/2 lg:w-1/3 xl:w-1/5 md:px-2">
    <div class="flex flex-col items-center justify-center animate-pulse space-y-4">
        <div class="w-32 h-32 bg-gray-400 rounded-full"></div>
        <div class="flex-1 w-1/2 py-1 space-y-4">
            <div class="w-3/4 h-4 bg-gray-400 rounded"></div>
            <div class="space-y-2">
                <div class="h-4 bg-gray-400 rounded"></div>
                <div class="h-4 bg-gray-400 rounded"></div>
            </div>
        </div>
    </div>
</div>
@endisset
