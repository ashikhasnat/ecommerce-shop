<x-layouts.app>
    @section('title')
    Checkout
    @endsection
    <x-container>
        <Check-Out>
            @if (session()->has('coupon_code'))
            <div slot="session_coupon" class=" flex mt-14 text-gray-600">
                <p class=" flex-1 ml-4">Coupon: <span
                        class=" text-gray-900 p-px">({{ session('coupon_code')->coupon_code }})</span></p>
                <p class=" flex-1 ml-4">{{ session('coupon_code')->discount }}%</p>
            </div>
            @endif
        </Check-Out>
    </x-container>
</x-layouts.app>