<x-layouts.app>
    @section('title')
    Cart
    @endsection
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

        <Cart-Show @if (session()->has('coupon_code')) coupon_code="{{  session('coupon_code')->coupon_code }}"
            discount="{{ session('coupon_code')->discount }}" @endif>
        </Cart-Show>

    </x-container>
</x-layouts.app>