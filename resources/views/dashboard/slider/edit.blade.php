<x-layouts.dashboard>
    <div class="flex mx-auto flex-col mt-10 py-8 sm:px-12">
        @include('inc.session-msgs')
        <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="">
                        <div class="mb-3">
                            <label for="title" class="text-sm font-medium leading-5 text-gray-700">Title</label>
                            <input id="title" name="title" type="text" placeholder="Title" value="{{ $slider->title }}"
                                class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('title')
                            <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="brand_id" class="text-sm font-medium leading-5 text-gray-700">Brand</label>
                            <select id="brand_id" name="brand_id"
                                class="mt-1 form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                {{-- <option value="null" selected disabled>Select Brand</option> --}}
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @if ($brand->id === $slider->brand->id )
                                    selected
                                    @endif
                                    >{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="category" class="text-base font-medium leading-5 text-gray-700">
                                Categories</label>
                            <select id="category_id" name="category_id"
                                class="mt-1 form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                {{-- <option value="null" selected disabled>Select Category</option> --}}
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" @if ($cat->id === $slider->category->id )
                                    selected
                                    @endif
                                    >{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-cols-1">
                            <div class="mt-6 col-span-1">
                                <p class="block text-sm leading-5 font-medium text-gray-700">
                                    Thumbnail
                                </p>
                                <div
                                    class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <label class="text-indigo-600 block mb-6" for="thumbnail">Upload a
                                            Thumbnail</label>
                                        <input class="text-indigo-600 custom-file-input" type="file" name="thumbnail"
                                            id="thumbnail" accept="image/*">
                                        <p class="mt-6 text-xs text-gray-500">
                                            PNG, JPG
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <label for="custom_product_link" class="text-sm font-medium leading-5 text-gray-700">Custom
                                Product Link</label>
                            <input id="custom_product_link" name="custom_product_link" type="custom_product_link"
                                placeholder="exp: /shop/some-product or full URL"
                                value="{{ $slider->custom_product_link }}"
                                class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('custom_product_link')
                            <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-between">
                    <button
                        class="py-2 px-4 text-sm leading-5 font-medium rounded-md text-gray-600 bg-indigo-300 shadow-sm hover:bg-indigo-400 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                        <a href="{{ route('product.index') }}">Back</a>
                    </button>
                    <button type="submit"
                        class="py-2 px-4 text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                        Update
                    </button>
                </div>
        </form>
        @if ($errors->any())
        <div class=" text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

</x-layouts.dashboard>