<x-layouts.dashboard>
    <section style="max-width: 900px" class="mx-auto mt-20">
        @include('inc.session-msgs')
        <form action="{{ route('company-info.update', $companyInfo->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="flex flex-col space-y-3 px-6 ">
                <div class=" flex-1">
                    <label for="coupon_code" class="text-base font-medium leading-5 text-gray-700">
                        Address</label>
                    <input id="address" name="address" value="{{ $companyInfo->address }}"
                        class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('address')
                    <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                    @enderror
                </div>
                <div class=" flex-1">
                    <label for="coupon_code" class="text-base font-medium leading-5 text-gray-700">
                        Phone</label>
                    <input type="tel" id="phone" name="phone" value="{{ $companyInfo->phone }}"
                        class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('phone')
                    <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="coupon_code" class="text-base font-medium leading-5 text-gray-700">
                        Address</label>
                    <input type="email" id="email" name="email" value="{{ $companyInfo->email }}"
                        class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('email')
                    <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="py-2 px-4 text-base leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                    Update
                </button>
            </div>
        </form>
    </section>
</x-layouts.dashboard>