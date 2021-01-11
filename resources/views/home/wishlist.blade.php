<x-layouts.app>
    <main class=" container mx-auto">
        <div class=" flex justify-between my-6">
            <div class=" flex text-sm items-center justify-center">
                <p class=" hover:text-teal-500"><a href="/">Home</a></p>
                <i style="font-size: 9px; transform: translateY(1px)"
                    class="fas fa-chevron-right text-gray-500 mx-2"></i>
                @if (request()->is('wishlist'))
                <p class=" text-teal-400">Wishlist</p>
                @endif
            </div>
            <p class="text-xl font-extrabold uppercase">Wishlist</p>
        </div>

        <div class=" grid grid-cols-4 justify-items-center bg-gray-100 py-3 rounded-md font-normal lg:font-bold mb-6">
            <p class=" col-span-1">PRODUCT NAME</p>
            <p class=" col-span-1">UNIT PRICE</p>
            <p class=" col-span-1">STOCK STATUS</p>
        </div>
        <Wishlist-Show></Wishlist-Show>

    </main>
</x-layouts.app>