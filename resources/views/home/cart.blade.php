<x-layouts.app>
    <x-container>
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
        <Cart-Show>
        </Cart-Show>
    </x-container>
</x-layouts.app>