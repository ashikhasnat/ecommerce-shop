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
                            class=" single-product-child-card absolute bottom-1/2 right-1 flex flex-col items-center justify-center">
                            <Add-To-Wishlist-Home :product-id="{{ $product->id }}"></Add-To-Wishlist-Home>
                            <a href="{{ route('home-product.show',$product->id) }}"
                                class="bg-white transform rounded-full text-center pt-2 pb-2 px-3 hover:bg-red-500 hover:text-white"><i
                                    class="fas fa-long-arrow-alt-right text-lg"></i></a>
                        </div>
                    </div>

                    <div class="px-4 py-2 box-shadow">
                        @include('inc.home.product-details')
                    </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
</div>