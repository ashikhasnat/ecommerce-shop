<div class=" bg-gray-200 py-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-9 p-5 mb-8 container mx-auto bg-white">
        <div class="col-span-1 lg:col-span-2 p-6">
            <h1 class="text-xl font-bold uppercase pb-2">
                {{ $singleCategories->name }}
            </h1>
            <hr class="bg-teal-400 h-px mb-4">
            <ul>
                @foreach ($singleCategories->subcategories as $subcategory)
                <li class="text-sm text-gray-600 capitalize py-1 hover:text-teal-400">
                    <a href="">{{ $subcategory->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class=" col-span-1 lg:col-span-2 h-96 lg:h-full border bg-cover bg-no-repeat bg-center"
            style="background-image: url({{ asset('imgs/category-home-banner.jpg') }})">
            {{-- <img src="" alt="" class=" object-fill" height="100%"> --}}
        </div>
        <div class=" col-span-full lg:col-span-5 mt-6 lg:mt-0 lg:ml-5">
            <div class="grid grid-cols-1 sm:grid-cols-3 justify-center items-center gap-4">
                @foreach ($singleCategories->products as $product)
                @if ($loop->index < 6) <div class="col-span-full sm:col-span-1 h-80 relative"
                    style="max-height: 20rem;">
                    <div class=" h-48 w-full bg-cover bg-center bg-no-repeat single-product-card"
                        style="background-image: url({{ $product->thumbnail }});">
                        <div
                            class=" single-product-child-card flex absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 scale-90">
                            <Add-To-Cart :product_id="{{ $product->id }}" :price="{{ $product->price }}"
                                :cart_option="false" @auth :auth_id="{{ auth()->id() }}" @endauth></Add-To-Cart>
                            <Add-To-Wishlist-Home :product_id="{{ $product->id }}" @auth :auth_id="{{ auth()->id() }}"
                                @endauth></Add-To-Wishlist-Home>
                            <a href="{{ route('home-product.show',$product->id) }}"
                                class="bg-white rounded-full flex justify-center items-center w-10 h-10 hover:bg-red-500 hover:text-white ml-1"><i
                                    class="fas fa-long-arrow-alt-right text-base"></i></a>
                        </div>
                    </div>

                    <div class="px-4 py-2 box-shadow">
                        @include('inc.home.product-details-home')
                    </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
</div>