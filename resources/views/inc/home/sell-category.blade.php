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
                @if ($loop->index < 12)
                 <div class="col-span-full sm:col-span-1 h-72" style="max-height: 18rem;">
                    <div class=" h-48 w-full bg-cover bg-center bg-no-repeat"
                        style="background-image: url({{ $product->thumbnail }});">
                    </div>
                    <div class="p-6 box-shadow">
                        <p class=" leading-4 text-sm break-words my-1">
                            <a href="" class="text-gray-700 font-semibold">{{ $product->title }}</a>
                        </p>
                        <p class=" text-teal-400 font-bold">${{ $product->price }}</p>
                    </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
</div>