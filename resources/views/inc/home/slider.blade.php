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