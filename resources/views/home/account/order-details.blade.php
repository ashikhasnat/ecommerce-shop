<x-account>
    <p class="ml-2 my-4">Order # <span class=" bg-yellow-100 px-px">{{ $orderedProducts->id }}</span> was placed on
        <span class=" bg-yellow-100 px-px">{{ $orderedProducts->created_at->format('F j, Y') }}</span></p>
    <h1 class=" font-bold text-xl mb-4 ml-2 uppercase">Order details</h1>
    <div class="w-full p-6 flex justify-center items-center box-shadow mb-16">
        <div class="bg-white w-full p-2">
            <p class=" ml-4 my-2">Payment Transaction ID: <span
                    class=" text-gray-600 font-semibold">{{ $orderedProducts->transaction_id}}</span>
            </p>
            <div class="flex font-semibold py-4 text-sm border-b border-gray-200">
                <h1 class="ml-4 flex-1">Product</h1>
                <h1 class="ml-4 flex-1">Sub Total</h1>
            </div>
            @foreach ($orderedProducts->products as $products)
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
                    <p class="" v-text="convertToCurrency({{ $sub_total }})"></p>
                </div>
            </div>
            @endforeach
            <div class="flex text-xl mt-20 mb-2">
                <p class="flex-1 ml-4">Total :</p>
                <p class="flex-1 ml-4 text-teal-500 font-semibold"
                    v-text="convertToCurrency({{ $orderedProducts->total }})">
                </p>
            </div>
        </div>
    </div>
</x-account>