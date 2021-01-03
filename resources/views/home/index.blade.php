<x-layouts.app>
    @include('inc.header-section.header')
    <div class=" my-8 flex flex-col lg:flex-row">
        <div class="lg:w-4/5 w-full">
            <slider>
                @foreach ($products as $product)
                <div slot="slide" class="slide bg-white">
                    <section class="w-full h-full relative" style="background-image: url({{ $product->thumbnail }});       background-position: center;
                        background-size: cover;background-repeat: no-repeat;">
                        <div class=" flex flex-col justify-center h-full w-full sm:ml-20">
                            <h2 class=" font-semibold text-2xl text-gray-400">{{ $product->category->name }}</h2>
                            <h1
                                class=" w-1/2 leading-tight my-5 uppercase text-white text-5xl font-bold border-l-4 border-teal-400 pl-4">
                                {{ $product->title }}</h1>
                            <p class=" font-semibold text-2xl text-gray-400">{{ $product->brand->name }}</p>
                            <a href=""
                                class=" text-sm uppercase py-2 px-4 mt-6 border w-max-content text-white hover:border-teal-400 hover:bg-teal-400 transition-colors duration-300 ease-linear">shop
                                now</a>
                        </div>
                    </section>
                </div>
                @endforeach
            </slider>
        </div>
        <div class=" w-full lg:w-1/5 mt-3 lg:ml-7">
            <div class=" border-b-2 pb-2 relative mb-5">
                <h1 class=" text-xl font-bold uppercase">
                    Best Seller
                </h1>
                <hr class=" bg-teal-400 h-1 w-16 absolute bottom-0 transform translate-y-1">
            </div>
            <div class="grid grid-cols-3 grid-rows-1 lg:grid-cols-1 lg:grid-rows-3 auto-cols-fr">
                @foreach ($products as $product)
                <div class="p-4 border mx-2 lg:my-2 col-span-1 row-span-1 lg:col-span-1 lg:row-span-1 lg:flex">
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
                @endforeach
            </div>

        </div>
    </div>
</x-layouts.app>