<x-layouts.dashboard>
    <div class="sm:px-14 text-right flex justify-between my-4 ">
        <h1 class=" font-semibold text-3xl">Orders</h1>
    </div>
    <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base font-semibold leading-4 text-gray-800 uppercase tracking-wider">
                            Order ID
                        </th>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base font-semibold leading-4 text-gray-800 uppercase tracking-wider">
                            Customer Name
                        </th>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-semibold text-gray-800 uppercase tracking-wider">
                            Order Total
                        </th>

                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-semibold text-gray-800 uppercase tracking-wider">
                            Date
                        </th>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-semibold text-gray-800 uppercase tracking-wider">
                            Customer Email
                        </th>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-semibold text-gray-800 uppercase tracking-wider">
                            Status
                        </th>
                        <th></th>

                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($allOrders as $order)
                    <tr>
                        <td data-label="Order ID" class="px-3 py-4 whitespace-no-wrap">
                            #{{ $order->id  }}
                        </td>
                        <td data-label="Customer Name" class="px-3 py-4 whitespace-no-wrap">
                            {{ $order->user->name }}
                        </td>
                        <td data-label="Order Total" class="px-3 py-4 whitespace-no-wrap">

                            @if ($order->currency == "USD")
                            <p class="text-xs break-words leading-5 text-gray-900"
                                v-text="convertToCurrency({{ $order->total}},'es-US', 'USD')"></p>
                            @else
                            <p class="text-xs break-words leading-5 text-gray-900"
                                v-text="convertToCurrency({{ $order->total  }})"></p>
                            @endif
                        </td>

                        {{-- category --}}
                        <td data-label="Date" class="px-3 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $order->created_at->format("F j, Y, g:i a") }}
                        </td>
                        {{-- category --}}
                        <td data-label="Customer Email"
                            class="px-3 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $order->user->email }}
                        </td>
                        {{-- price --}}
                        <td data-label="Status" class="text-sm leading-5 text-gray-600 ">
                            <span class="bg-orange-100 px-1 py-px rounded-sm">
                                Pending
                            </span>
                        </td>
                        <td class="px-3 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <a href="{{ route('admin-order.show',$order->id ) }}"
                                class="text-indigo-600 hover:text-indigo-900">View</a>
                        </td>
                    </tr>
                    <!-- More rows... -->
                    @endforeach
                </tbody>
            </table>
            <section class="my-6 text-sm">
                {{ $allOrders->links() }}
            </section>
        </div>
    </div>
</x-layouts.dashboard>