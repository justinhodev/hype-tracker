<div class="max-w-screen-xl">
    <div class="flex justify-end w-full">
        <label>
            Search
            <input wire:model="search" type="text" class="px-3 py-2 mx-2 leading-tight border rounded shadow text-accent-700 appearance-non focus:outline-none focus:shadow-outline" placeholder="Search Sneakers..." />
        </label>
    </div>

    <div class="flex justify-center w-full">
        <div class="flex flex-col p-5 md:flex-wrap md:flex-row">
            @forelse ($sneakers as $sneaker)
            <x-sneaker-container :sneaker="$sneaker" />
            @empty
            <div class="w-full">
                <h3>Sneaker Not Found</h3>
            </div>
            @endforelse
        </div>
    </div>
</div>
