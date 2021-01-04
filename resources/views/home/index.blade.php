<x-layouts.app>
    @include('inc.home.header')
    <div class=" my-8 flex flex-col lg:flex-row container mx-auto">
        @include('inc.home.slider')
        <div class=" w-full lg:w-1/5 mt-3 lg:ml-7">
            <div class=" border-b-2 pb-2 relative mb-5">
                <h1 class=" text-xl font-bold uppercase">
                    Best Seller
                </h1>
                <hr class=" bg-teal-400 h-1 w-16 absolute bottom-0 transform translate-y-1">
            </div>
            <div class="grid grid-cols-3 grid-rows-1 lg:grid-cols-1 lg:grid-rows-3 auto-cols-fr">
                @foreach ($products as $product)
                @if ($loop->index < 3) <div
                    class="p-4 border mx-2 lg:my-2 col-span-1 row-span-1 lg:col-span-1 lg:row-span-1 lg:flex">
                    <div class=" w-20 h-20 border mr-2" style="min-width: 6rem">
                        <img src="{{ $product->thumbnail }}" alt="" class=" object-cover h-full">
                    </div>
                    <div class=" overflow-x-hidden">
                        <p class=" leading-4 break-words">
                            <a href="" class=" text-sm text-gray-700 font-semibold">{{ $product->title }}</a>
                        </p>
                        <p class=" text-teal-400 font-bold">${{ $product->price }}</p>
                    </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    </div>
    @include('inc.home.deal-product')
    @include('inc.home.sell-category')
    @include('inc.footer-section.footer-nav')
    @include('inc.footer-section.footer')
</x-layouts.app>