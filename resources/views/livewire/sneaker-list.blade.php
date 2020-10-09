<div class="max-w-screen-xl">
    <div class="flex justify-end w-full">
        <label>
            Search
            <input
                wire:model="search"
                type="text"
                class="w-1/6 px-3 py-2 leading-tight border rounded shadow text-accent-700 appearance-non focus:outline-none focus:shadow-outline"
                placeholder="Search Sneakers..."
            />
        </label>
    </div>

    <div class="flex justify-center w-full">
        <div class="flex flex-col p-5 md:flex-wrap md:flex-row">
            @forelse ($sneakers as $sneaker)
                    <div class="w-full py-2 md:w-1/2 lg:w-1/3 md:px-2">
                        <a href="/sneaker/{{ $sneaker->id }}">
                        <h3 class="mb-4 font-medium">
                            {{ $sneaker->name }}
                        </h3>
                        </a>
                    </div>
            @empty
                <div class="w-full">
                    <h3>Sneaker Not Found</h3>
                </div>
            @endforelse
        </div>
    </div>
</div>
