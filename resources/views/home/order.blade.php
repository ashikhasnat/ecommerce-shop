<x-layouts.app>
    @section('title')
    Orders
    @endsection
    <Cart-Clear></Cart-Clear>
    <x-container>
        <div class=" w-full py-3 border-2 border-dashed text-center my-8 border-red-500 text-red-500 font-semibold ">
            <h1>Thank You , Your order has been received.</h1>
        </div>
        <div class=" flex flex-col p-4 sm:flex-row justify-evenly text-gray-500 text-sm mb-12">
            <p>Order number: <span class=" text-gray-600 font-semibold">#{{ $userOrder->id }}</span></p>
            <p>Date: <span class=" text-gray-600 font-semibold">{{ $userOrder->created_at->format('F j, Y') }}</span>
            </p>
            <p>Email: <span class=" text-gray-600 font-semibold">{{ auth()->user()->email}}</span></p>
            @if ($userOrder->currency === "USD")
            <p>Total: <span class=" text-gray-600 font-semibold"
                    v-text="convertToCurrency({{ $userOrder->total}},'es-US', 'USD')"></span>
            </p>
            @else
            <p>Total: <span class=" text-gray-600 font-semibold"
                    v-text="convertToCurrency({{ $userOrder->total }})"></span>
            </p>
            @endif
            <p>Payment Transaction ID: <span class=" text-gray-600 font-semibold">{{ $userOrder->transaction_id}}</span>
            </p>
        </div>
        <h1 class=" font-bold text-xl mb-4 ml-2 uppercase">Order details</h1>
        <div class="w-full p-6 flex justify-center items-center box-shadow mb-16">
            <div class="bg-white w-full p-2">
                <div class="flex font-semibold py-4 text-sm border-b border-gray-200">
                    <h1 class="ml-4 flex-1">Product</h1>
                    <h1 class="ml-4 flex-1">Sub Total</h1>
                </div>
                @foreach ($orderedProducts as $products)
                <div class="grid grid-cols-2 text-sm text-gray-500">
                    <div class="col-span-1 ml-4 my-2">
                        <p class="">
                            {{ $products->title }} <span class="mx-px">x</span>
                            <span class="text-gray-700">{{ $products->quantity }}</span>
                        </p>
                    </div>
                    @php
                    $sub_total = $products->quantity * $products->price
                    @endphp
                    <div class="col-span-1 ml-4 my-2 text-gray-900">
                        @if ($userOrder->currency == "USD")
                        <p class="" v-text="convertToCurrency({{ $sub_total }},'es-US', 'USD')"></p>
                        @else
                        <p class="" v-text="convertToCurrency({{ $sub_total }})"></p>
                        @endif
                    </div>
                </div>
                @endforeach
                <div class="flex text-xl mt-20 mb-2">
                    <p class="flex-1 ml-4">Total :</p>
                    @if ($userOrder->currency == "USD")
                    <p class="flex-1 ml-4 text-teal-500 font-semibold"
                        v-text="convertToCurrency({{ $userOrder->total }},'es-US', 'USD')"></p>
                    @else
                    <p class="flex-1 ml-4 text-teal-500 font-semibold"
                        v-text="convertToCurrency({{ $userOrder->total }})"></p>
                    @endif
                </div>
            </div>
        </div>

    </x-container>
</x-layouts.app>