<x-layouts.dashboard>
    <section style="max-width: 900px" class="mx-auto mt-20">
        @include('inc.session-msgs')
        <form action="{{ route('coupon.store') }}" method="post">
            @csrf
            <div class=" flex flex-col lg:flex-row px-6 ">
                <div class=" flex-1">
                    <label for="coupon_code" class="text-base font-medium leading-5 text-gray-700">
                        Coupon Code</label>
                    <input id="coupon_code" name="coupon_code" value="{{ old('coupon_code') }}"
                        class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('coupon_code')
                    <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                    @enderror
                </div>
                <div class=" flex-1">
                    <label for="discount" class="text-base font-medium leading-5 text-gray-700">Discounts %
                    </label>
                    <input id="discount" name="discount" value="{{ old('discount') }}"
                        class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('discount')
                    <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="py-2 px-4 text-base leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                    Create
                </button>
            </div>
        </form>
    </section>
</x-layouts.dashboard>