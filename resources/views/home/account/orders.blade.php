<x-account>
    <div class="">
        <div class=" grid grid-cols-4 bg-gray-100 py-4 rounded">
            <div class=" col-span-1 pl-3 text-sm font-semibold">
                <p>ORDER</p>
            </div>
            <div class=" col-span-1 pl-3 text-sm font-semibold">
                <p>DATE</p>
            </div>
            <div class=" col-span-1 pl-3 text-sm font-semibold">
                <p>TOTAL</p>
            </div>
            <div class=" col-span-1 pl-3 text-sm font-semibold">
                <p>ACTION</p>
            </div>
        </div>
        @forelse ($orderedProducts as $product)
        <div class="grid grid-cols-4 py-4 rounded shadow-xs my-2">
            <div class=" col-span-1 pl-3 text-sm capitalize">
                <p>#{{ $product->id }}</p>
            </div>
            <div class=" col-span-1 pl-3 text-sm capitalize">
                <p>{{ $product->created_at->format('F j, Y') }}</p>
            </div>
            <div class=" col-span-1 pl-3 text-sm capitalize flex">
                @if ($product->currency == "USD")
                <p class=" mr-1" v-text="convertToCurrency({{ $product->total }})"> </p>
                @else
                <p class=" mr-1" v-text="convertToCurrency({{ $product->total * 84 }},'bn-BD', 'BDT')"> </p>
                @endif

            </div>
            <div class=" col-span-1 pl-3 text-sm capitalize flex">
                <a class=" hover:text-teal-400" href="{{ route('account_orders_details', $product->id ) }}"> View</a>
            </div>
        </div>
        @empty
        <div class="grid grid-cols-1 py-4 rounded shadow-xs my-2">
            <div class=" col-span-1 pl-3 text-center text-sm capitalize">
                <p>No Orders</p>
            </div>
        </div>
        @endforelse
    </div>
</x-account>