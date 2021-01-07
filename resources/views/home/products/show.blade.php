<x-layouts.app>
    <main class=" container mx-auto">
        <div class=" flex my-5">
            <div class=" flex text-sm items-center justify-center">
                <p class=" hover:text-teal-500"><a href="/">Home</a></p>
                <i style="font-size: 9px; transform: translateY(1px)"
                    class="fas fa-chevron-right text-gray-500 mx-2"></i>
                <p class="hover:text-teal-500"><a href="">Shop</a></p>
                <i style="font-size: 9px; transform: translateY(1px)"
                    class="fas fa-chevron-right text-gray-500 mx-2"></i>
                <p class="hover:text-teal-500"><a
                        href="{{ route('home-category.show', $product->category->slug) }}">{{ $product->category->name }}</a>
                </p>
                <i style="font-size: 9px; transform: translateY(1px)"
                    class="fas fa-chevron-right text-gray-500 mx-2"></i>

                @if ($product->subcategory)
                <p class="hover:text-teal-500"><a
                        href="{{ route('home-subcategory.show', $product->subcategory->slug) }}">{{ $product->subcategory->name }}</a>
                </p>
                <i style="font-size: 9px; transform: translateY(1px)"
                    class="fas fa-chevron-right text-gray-500 mx-2"></i>
                @endif

                @if (request()->is('shop/*'))
                <p class=" text-teal-400">{{ $product->title }}</p>
                @endif
            </div>
        </div>
        <hr class=" mb-5 w-full h-px bg-gray-100 opacity-50">
        <section class=" grid grid-cols-2 gap-x-4">
            <div class=" col-span-1">
                {{-- <div class=" bg-cover bg-center bg-no-repeat h-96 "
                    style="background-image: url({{ $product->thumbnail }})">
            </div> --}}
            <product-slider></product-slider>
            </div>
            <div class=" col-span-1">
                <div class=" font-bold">
                    <h1 class=" text-3xl">{{ $product->title }}</h1>
                    <p class=" text-teal-400 text-2xl my-2">${{ $product->price }}</p>
                    <div class="flex justify-start items-center">
                        <p class="mr-1">Brand:</p>
                        <div class="">
                            <img src="{{ $product->brand->brand_logo }}" alt="">
                        </div>
                    </div>
                    <div class="text-sm font-medium text-gray-500 my-4">
                        @if ($product->stock_status == 0)
                        <p class="">Availability: <i class="fas fa-exclamation-circle text-red-500 mx-1"></i> Out Of
                            Stock
                        </p>
                        @else
                        <p class="">Availability: <i class="far fa-check-circle text-green-400 mx-1"></i> in
                            Stock</p>
                        @endif
                    </div>
                    <div class=" text-sm font-normal text-gray-500">
                        <p>
                            {{ $product->short_details }}
                        </p>
                    </div>

                    <div class=" my-3">
                        <p class=" text-red-400 ml-3 text-lg my-1"><i class="far fa-clock mr-2"></i>Hungry up ! Deal end
                            in :
                        </p>
                        <product-count-down starttime="Nov 5, 2018 15:37:25" endtime="Nov 8, 2021 16:37:25" trans='{  
                                "day":"Days",
                                "hours":"Hours",
                                "minutes":"Minute",
                                "seconds":"Seconds",
                                "expired":"Event has been expired.",
                                "running":"Till the end of event.",
                                "upcoming":"Till start of event.",
                                "status": {
                                   "expired":"Expired",
                                   "running":"Running",
                                   "upcoming":"Future"
                                  }}'></product-count-down>
                    </div>
                    <div class=" flex mb-4">
                        <div class="mr-3">
                            <quantity></quantity>
                        </div>
                        <button
                            class=" font-bold text-sm py-1 px-5 border bg-teal-400 text-white outline-none focus:outline-none">
                            Add To
                            Cart</button>
                    </div>
                    <div class="text-sm font-medium text-gray-500">
                        <p><span class=" text-gray-700">SKU:</span> {{ $product->sku }}</p>
                        <hr class="my-1 opacity-50">
                        <p><span class=" text-gray-700">Category:</span> {{ $product->category->name }}</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.app>