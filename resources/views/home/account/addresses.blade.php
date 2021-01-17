<x-account>
    <div class=" grid grid-cols-2 gap-x-4">
        <div class=" col-span-1">
            <div class="flex justify-between bg-gray-100  py-4 px-3">
                <h1 class=" font-semibold">Billing Address</h1>
                @if ($billingAddress)
                <a class=" text-red-500" href="{{ route('billing.edit',$billingAddress->id) }}">Edit</a>
                @else
                <a class=" text-red-500" href="{{ route('billing.create') }}">Add</a>
                @endif
            </div>
            @if ($billingAddress)
            <div class="border border-gray-100 p-4">
                <p class=" my-1">{{ $billingAddress->first_name }} {{ $billingAddress->last_name }}</p>
                <p class=" my-1">{{ $billingAddress->company_name ?? '' }}</p>
                <p class=" my-1">{{ $billingAddress->country_name}}</p>
                <p class=" my-1">{{ $billingAddress->street_address}}</p>
                <p class=" my-1">{{ $billingAddress->city }}</p>
                <p class=" my-1">{{ $billingAddress->post_code }}</p>
                <p class=" my-1">{{ $billingAddress->phone }}</p>
            </div>
            @endif
        </div>
        <div class="col-span-1">
            <div class="flex justify-between bg-gray-100  py-4 px-3">
                <h1 class=" font-semibold">Shipping Address</h1>
                @if ($shippingAddress)
                <a class=" text-red-500" href="{{ route('shipping.edit', $shippingAddress->id) }}">Edit</a>
                @else
                <a class=" text-red-500" href="{{ route('shipping.create') }}">Add</a>
                @endif
            </div>
            @if ($shippingAddress)
            <div class="border border-gray-100 p-4">
                <p class=" my-1">{{ $shippingAddress->first_name }} {{ $shippingAddress->last_name }}</p>
                <p class=" my-1">{{ $shippingAddress->company_name ?? '' }}</p>
                <p class=" my-1">{{ $shippingAddress->country_name}}</p>
                <p class=" my-1">{{ $shippingAddress->street_address}}</p>
                <p class=" my-1">{{ $shippingAddress->city }}</p>
                <p class=" my-1">{{ $shippingAddress->post_code }}</p>
                <p class=" my-1">{{ $shippingAddress->phone }}</p>
            </div>
            @endif
        </div>
    </div>
</x-account>