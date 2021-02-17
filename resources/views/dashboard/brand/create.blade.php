<x-layouts.dashboard>
    <section style="width: 700px" class="mx-auto mt-8">
        @include('inc.session-msgs')
        <div class="mb-16">
            <p class=" text-red-600 text-xs mb-4">Check brand Before Add New One *</p>
            <label for="brand" class="text-base font-medium leading-5 text-gray-700">All Brands</label>
            <select id="brand" name="brand"
                class="mt-1 form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-base sm:leading-5">
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="block">
                <label for="name" class="text-base font-medium leading-5 text-gray-700">Add New
                    brand</label>
                <input id="name" name="name" value="{{ old('name') }}"
                    class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                @error('name')
                <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-6 col-span-1">
                <p class="block text-sm leading-5 font-medium text-gray-700">
                    Logo
                </p>
                <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                            viewBox="0 0 48 48">
                            <path
                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <label class="text-indigo-600 block mb-6" for="brand_logo">Upload a
                            Logo</label>
                        <input class="text-indigo-600 custom-file-input" type="file" name="brand_logo" id="brand_logo"
                            accept="image/*">
                        <p class="mt-6 text-xs text-gray-500">
                            PNG, JPG
                        </p>
                    </div>
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