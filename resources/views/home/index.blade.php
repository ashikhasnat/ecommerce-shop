<x-layouts.app>
    <div class="my-8 grid grid-cols-2 lg:grid-cols-8 container mx-auto">
        @include('inc.home.slider')
        <div class=" col-span-full lg:col-span-2 lg:ml-7">
            <div class=" border-b-2 pb-2 relative mb-5">
                <h1 class=" text-xl font-bold uppercase">
                    Best Seller
                </h1>
                <hr class=" bg-teal-400 h-1 w-16 absolute bottom-0 transform translate-y-1">
            </div>
            <div class="">
                @foreach ($products as $product)
                <div class="p-3 border mx-2 flex my-4 lg:my-1 ">
                    <div class=" w-24 h-24 lg:w-20 lg:h-20 border mr-2" style="min-width: 6rem">
                        <img src="{{ $product->thumbnail }}" alt="" class=" object-cover h-full">
                    </div>
                    <div class=" overflow-x-hidden">
                        <p class=" leading-4 break-words">
                            <a href="" class=" text-sm text-gray-700 font-semibold">{{ $product->title }}</a>
                        </p>
                        <p class=" text-teal-400 font-bold">${{ $product->price }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('inc.home.deal-product')
    @include('inc.home.sell-category')
    @include('inc.home.top-product')

</x-layouts.app>