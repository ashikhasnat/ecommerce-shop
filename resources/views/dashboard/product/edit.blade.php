@section('ckeditor-top-js')
<script src="{{ asset('js/admin/ckeditor/ckeditor.js') }}"></script>
@endsection
<x-layouts.dashboard>
    <div class="flex mx-auto flex-col mt-10 py-8 sm:px-12">
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="">
                        <div class="mb-3">
                            <label for="title" class="text-sm font-medium leading-5 text-gray-700">Title</label>
                            <input id="title" name="title" type="text" placeholder="Title" value="{{ $product->title }}"
                                class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('title')
                            <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="text-sm font-medium leading-5 text-gray-700">Price</label>
                            <input id="price" name="price" type="number" placeholder="$" value="{{ $product->price }}"
                                class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('price')
                            <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="discount" class="text-sm font-medium leading-5 text-gray-700">Discount
                                (Optional)</label>
                            <input id="discount" name="discount" type="number" placeholder="$"
                                value="{{ $product->discount }}"
                                class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('discount')
                            <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="brand_id" class="text-sm font-medium leading-5 text-gray-700">Brand</label>
                            <select id="brand_id" name="brand_id"
                                class="mt-1 form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                <option value="{{ $product->brand->id }}" selected>{{ $product->brand->name }}</option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <Edit-Select-Category sub-cat-id="{{ $product->sub_category_id }}"
                        cat-id="{{ $product->category_id }}">
                        </Edit-Select-Category> --}}
                        <div class="flex flex-col">
                            <div class="">
                                <label for="category_id"
                                    class="text-base my-2 font-medium leading-5 text-gray-700 block">
                                    Select Category
                                </label>
                                <select id="category_id" name="category_id"
                                    class="mt-1 mr-1 py-2 px-3 border w-full border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm sm:leading-5">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($product->category_id == $category->id)
                                        selected
                                        @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- @if ($product->subcategory->id === null) --}}
                            <div class="">
                                <h1 class="font-semibold my-1 p2">Select SubCategory</h1>
                                <select id="sub_category_id" name="sub_category_id"
                                    class="mt-1 mr-1 py-2 px-3 border w-full border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm sm:leading-5">
                                    <option value="null" disabled>SubCategory</option>
                                    @foreach ($product->category->subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" @if ($product->sub_category->id ==
                                        $subcategory->id)
                                        selected
                                        @endif>{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- @endif --}}

                        </div>
                        <div class="my-3">
                            <div class="">
                                <label for="short_details" class="font-medium mb-3 leading-5 text-gray-700">
                                    Short Description
                                </label>
                                <textarea class=" form-textarea" id="short_details" name="short_details">
                                    {{ $product->short_details }}
                                </textarea>

                            </div>
                            <div class="my-3">
                                <label for="long_details" class="font-medium leading-5 text-gray-700 mb-3">
                                    Long Description
                                </label>
                                <textarea class=" form-textarea" id="long_details" name="long_details">
                                    {{ $product->long_details }}
                                </textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="stock_status" class="text-sm font-medium leading-5 text-gray-700">Stock
                                Status</label>
                            <select id="stock_status" name="stock_status"
                                class="mt-1 form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                <option value="0">Out Of Stock</option>
                                <option value="1" @if($product->stock_status == 1)
                                    selected
                                    @endif>In Stock</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" flex justify-evenly my-8 bg-white py-6">
                <label class="inline-flex items-center mt-3">
                    <input type="checkbox" @if ($product->top_rated == 1)
                    checked
                    @endif value="1" class="form-checkbox h-5 w-5 text-indigo-600"
                    name="top_rated"><span class="ml-2 text-gray-700">Top Rated</span>
                </label>
                <label class="inline-flex items-center mt-3">
                    <input type="checkbox" @if ($product->best_seller == 1)
                    checked
                    @endif value="1" class="form-checkbox h-5 w-5 text-indigo-600"
                    name="best_seller"><span class="ml-2 text-gray-700">Best Seller</span>
                </label>
                <label class="inline-flex items-center mt-3">
                    <input type="checkbox" @if ($product->weekly_deal == 1)
                    checked
                    @endif value="1" class="form-checkbox h-5 w-5 text-indigo-600"
                    name="weekly_deal"><span class="ml-2 text-gray-700">Weekly Deal</span>
                </label>
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