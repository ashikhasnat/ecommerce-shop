<x-layouts.dashboard>
    <div class="px-12 text-right flex justify-between mb-4 mt-6">
        <h1 class=" font-semibold text-3xl">Coupons</h1>
        <a href="{{ route('coupon.create') }}"
            class="text-base border text-indigo-600 border-indigo-600 px-6 py-2 hover:opacity-75">Create
            New Coupon</a>
    </div>
    @include('inc.session-msgs')
    <div class="flex flex-col mb-6">
        {{-- <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"> --}}
        <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                                Code
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Discounts %
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($coupons as $coupon)
                        <tr>
                            <td data-label="Code" class="px-3 py-4 whitespace-no-wrap">
                                {{ $coupon->coupon_code }}
                            </td>
                            <td data-label="Discounts" class="px-3 py-4 whitespace-no-wrap">
                                {{-- created at --}}
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $coupon->discount}}%
                                </span>
                            </td>
                            <td class="px-2 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <a href="" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</x-layouts.dashboard>