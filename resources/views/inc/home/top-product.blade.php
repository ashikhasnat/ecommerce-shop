<main class=" bg-gray-200 mb-10">
    <div class="container mx-auto bg-white px-5 py-20">
        <div class=" border-b-2 border-gray-200 pb-4 relative mb-10 flex justify-between items-center">
            <div class="">
                <h1 class=" text-2xl font-bold uppercase">
                    Top Products
                </h1>
                <hr class=" bg-teal-400 h-1 w-20 absolute bottom-0 transform translate-y-1">
            </div>
            <div class="font-semibold text-sm">
                <a class=" py-1 px-3 text-gray-100 hover:text-teal-400 mx-2 bg-teal-400" href="">Latest Products</a>
                <a class=" py-1 px-3 text-gray-700 hover:text-teal-400 mx-2" href="">Top Rating</a>
            </div>
        </div>
        <div class=" grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($topProducts as $product)
            <div class="mx-2 flex my-4 lg:my-1 col-span-1 h-32 ">
                <div class=" w-2/6">
                    <img src="{{ $product->thumbnail }}" alt="" class=" object-cover h-full">
                </div>
                <div class="p-4 w-4/6" style="border: 1px solid rgba(92, 92, 92, 0.144);">
                    @include('inc.home.product-details')
                </div>
            </div>
            @endforeach
        </div>
        <div class=" px-1">
            <div class=" bg-cover bg-center flex justify-center items-center flex-col py-12 my-20"
                style="background-image: url({{ asset('imgs/top-product.jpg') }})">
                <h1 class=" text-lg md:text-3xl font-bold">LATEST & SPECIAL BRANDS</h1>
                <a href=""
                    class=" border-gray-700 text-sm uppercase py-2 px-4 mt-6 border w-max-content text-gray-800 hover:text-white hover:border-teal-400 hover:bg-teal-400 transition-colors duration-200 ease-linear">shop
                    now</a>
            </div>
        </div>
        <div class=" grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 justify-items-center gap-y-4">
            <div class=" flex items-center col-span-1">
                <i class="far fa-thumbs-up text-teal-400 text-3xl mr-3"></i>
                <div class="">
                    <h1 class=" font-bold">100% SATISFACTION</h1>
                    <h2 class=" text-gray-600 text-sm">If you are unable</h2>
                </div>
            </div>
            <div class=" flex items-center col-span-1 pl-0 lg:border-l lg:pl-12">
                <i class="fas fa-hand-holding-usd text-teal-400 text-3xl mr-3"></i>
                <div class="">
                    <h1 class=" font-bold">SAVE 20% WHEN YOU</h1>
                    <h2 class=" text-gray-600 text-sm">Use credit card</h2>
                </div>
            </div>
            <div class=" flex items-center col-span-1 pl-0 lg:border-l lg:pl-12">
                <i class="fas fa-shipping-fast text-teal-400 text-3xl mr-3"></i>
                <div class="">
                    <h1 class=" font-bold">FAST FREE SHIPMENT</h1>
                    <h2 class=" text-gray-600 text-sm">Load any computer’s</h2>
                </div>
            </div>
            <div class=" flex items-center col-span-1 pl-0 lg:border-l lg:pl-12">
                <i class="fas fa-piggy-bank text-teal-400 text-3xl mr-3"></i>
                <div class="">
                    <h1 class=" font-bold">60-DAY MONEY BACK</h1>
                    <h2 class=" text-gray-600 text-sm">If you are unable</h2>
                </div>
            </div>
        </div>
    </div>
</main>