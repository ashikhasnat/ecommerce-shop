<x-layouts.app>
    <main class=" container mx-auto">
        <div class=" flex my-5">
            <div class=" flex text-sm items-center justify-center">
                <p class=" hover:text-teal-500"><a href="/">Home</a></p>
                <i style="font-size: 9px; transform: translateY(1px)"
                    class="fas fa-chevron-right text-gray-500 mx-2"></i>
                <p class="hover:text-teal-500"><a href="{{ route('shop.index') }}">Shop</a></p>
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
        <section class=" grid grid-cols-1 lg:grid-cols-2 gap-x-4">
            <div class=" col-span-1">
                @if ($product->images)
                <product-slider inline-template>
                    <div class="">
                        <agile class="main" ref="main" :options="options1" :as-nav-for="asNavFor1">
                            @foreach ($product->images as $image)
                            <div class="slide product-slide" :class="`slide--${{ $loop->index }}`">
                                <img src="{{ $image->image_path }}" />
                            </div>
                            @endforeach
                        </agile>
                        <agile class="thumbnails" ref="thumbnails" :options="options2" :as-nav-for="asNavFor2">
                            @foreach ($product->images as $image)
                            <div class="slide slide--thumbniail" :class="`slide--${{ $loop->index }}`"
                                @click="$refs.thumbnails.goTo({{ $loop->index }})">
                                <img src="{{ $image->image_path }}" />
                            </div>
                            @endforeach
                        </agile>
                    </div>
                </product-slider>
                @else
                <div class=" flex flex-col">
                    <div class=" bg-cover bg-center bg-no-repeat "
                        style="background-image: url({{ $product->thumbnail }}) ; height: 450px;">
                    </div>
                    <div class=" bg-cover bg-center bg-no-repeat w-32 border-2 border-teal-400 h-20 mt-4"
                        style="background-image: url({{ $product->thumbnail }}) ;">
                    </div>

                </div>
                @endif
            </div>

            <div class=" col-span-1 mt-4 lg:mt-0">
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
                            {!! $product->short_details !!}
                        </p>
                    </div>

                    <div class=" my-3">
                        <p class=" text-red-400 ml-2 text-lg my-1"><i class="far fa-clock mr-2"></i>Hungry up ! Deal end
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
                    <Add-To-Wishlist :product-id="{{ $product->id }}"></Add-To-Wishlist>
                    <div class="text-sm font-medium text-gray-500">
                        <p><span class=" text-gray-700">SKU:</span> {{ $product->sku }}</p>
                        <hr class="my-1 opacity-50">
                        <p><span class=" text-gray-700">Category:</span> {{ $product->category->name }}</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="my-20">
            <Other-Product-Info>
                <div slot="description" class="">
                    <p>
                        {!! $product->long_details !!}
                    </p>
                </div>
                <div class="" slot="info"> info </div>
                <div class="" slot="review">
                    @include('inc.home.product.review')
                </div>
                <div class="" slot="more-product">
                    <div class="grid grid-cols-1 sm:grid-cols-3 justify-center items-center gap-8 mb-16">
                        @forelse ($relatedProducts as $product)
                        <div class="col-span-full sm:col-span-1">
                            <div class=" h-60 w-full bg-cover bg-center bg-no-repeat"
                                style="background-image: url({{ $product->thumbnail }});">
                            </div>
                            <div class="p-6 box-shadow" style="border: 1px solid rgba(102, 101, 101, 0.185);">
                                @include('inc.home.product-details')
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full sm:col-span-1">
                            <h1 class=" text-2xl text-red-400">No Products</h1>
                        </div>
                        @endforelse

                    </div>
                </div>
            </Other-Product-Info>
        </div>
    </main>

</x-layouts.app>