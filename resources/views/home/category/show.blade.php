<x-layouts.app>
    <main class=" container mx-auto">
        <div class=" flex justify-between my-6">
            <div class=" flex text-sm items-center justify-center">
                <p class=" hover:text-teal-500"><a href="/">Home</a></p>
                <i style="font-size: 9px; transform: translateY(1px)"
                    class="fas fa-chevron-right text-gray-500 mx-2"></i>
                <p class="hover:text-teal-500"><a href="{{ route('shop.index') }}">Shop</a></p>
                <i style="font-size: 9px; transform: translateY(1px)"
                    class="fas fa-chevron-right text-gray-500 mx-2"></i>
                @if (request()->is('shop/category/*'))
                <p class=" text-teal-400">{{ $category->name }}</p>
                @endif
            </div>
            <p class="text-xl font-extrabold uppercase">{{ $category->name }}</p>

        </div>
        <div class=" grid grid-cols-4">
            <div class=" col-span-1">
                <div class="">
                    <div class=" border-b-2 pb-2 relative mb-5">
                        <h1 class=" text-xl font-bold uppercase">
                            BRANDS
                        </h1>
                        <hr class=" bg-teal-400 h-1 w-16 absolute bottom-0 transform translate-y-1">
                    </div>
                    <ul class=" text-sm text-gray-600">
                        @foreach ($brands as $brand)
                        <li class=" my-2 hover:text-teal-400"><a href=""><i
                                    style="font-size: 9px; transform: translateY(-1px)"
                                    class="fas fa-chevron-right text-gray-500 mr-2"></i>{{ $brand->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class=" col-span-full lg:col-span-3 lg:ml-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 justify-center items-center gap-8 mb-16">
                    @foreach ($products as $product)
                    <div class="col-span-full sm:col-span-1">
                        <div class=" h-60 w-full bg-cover bg-center bg-no-repeat"
                            style="background-image: url({{ $product->thumbnail }});">
                        </div>
                        <div class="p-6 box-shadow" style="border: 1px solid rgba(102, 101, 101, 0.185);">
                            <p class=" leading-4 text-sm break-words my-1">
                                <a href="{{ route('home-product.show', $product->slug) }}"
                                    class="text-gray-700 font-semibold">{{ $product->title }}</a>
                            </p>
                            <p class=" text-teal-400 font-bold">${{ $product->price }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <span class=" mb-8 flex justify-center">{{ $products->links() }}</span>
            </div>

    </main>
</x-layouts.app>