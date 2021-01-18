<x-layouts.dashboard>
    <div class="sm:px-14 text-right flex justify-between my-4 ">
        <h1 class=" font-semibold text-3xl">Orders</h1>
    </div>
    <div class="flex flex-col px-4 mb-6">
        {{-- <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"> --}}
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

                        </tr>
                    </thead>
                    @foreach ($allOrders as $order)
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-3 py-4 whitespace-no-wrap">
                                <div class="text-xs break-words leading-5 text-gray-900">
                                    #{{ $order->id  }}
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="text-xs leading-5 font-medium text-gray-900">
                                        {{ $order->user->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-no-wrap">
                                <p class="text-xs break-words leading-5 text-gray-900"
                                    v-text="convertToCurrency({{ $order->total}})"></p>
                            </td>

                            {{-- Brand --}}
                            <td class="px-3 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{ $order->created_at->format("F j, Y, g:i a") }}
                            </td>
                            {{-- category --}}
                            <td class="px-3 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{ $order->user->email }}
                            </td>
                            {{-- price --}}
                            <td class="text-sm leading-5 text-gray-600 ">
                                <p class="bg-orange-100 text-center">
                                    Pending
                                </p>
                            </td>
                            <td class="px-3 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <a href="{{ route('admin-order.show',$order->id ) }}"
                                    class="text-indigo-600 hover:text-indigo-900">View</a>
                            </td>
                        </tr>
                        <!-- More rows... -->
                    </tbody>
                    @endforeach
                </table>
                <section class="my-6 text-sm">
                    {{ $allOrders->links() }}
                </section>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</x-layouts.dashboard>