<x-layouts.app>
    @section('title')
    Search Results
    @endsection
    <x-container>
        <div class=" flex justify-between my-6">
            <div class=" flex text-sm items-center justify-center">
                <p class=" hover:text-teal-500"><a href="/">Home</a></p>
                <i style="font-size: 9px; transform: translateY(1px)"
                    class="fas fa-chevron-right text-gray-500 mx-2"></i>
                @if (request()->is('search-result'))
                <p class=" text-teal-400">Search Results</p>
                @endif
            </div>
            <p class="text-xl font-extrabold uppercase">Shop</p>
        </div>
        <div class=" flex justify-between items-center mb-5">
            <div class="relative">
                <h1 class=" text-xl font-bold uppercase">
                    BRANDS
                </h1>
                <hr class=" bg-teal-400 h-px w-16 absolute bottom-0 transform translate-y-1">
            </div>
            <div class=" text-lg">
                Search Result For <span class=" text-red-400">"{{ request()->searchQuery }}"</span>
            </div>
        </div>
        <div class=" grid grid-cols-4">
            <div class=" col-span-1">
                <div class="">
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
                    @forelse ($products as $product)
                    <div class="col-span-full sm:col-span-1">
                        @include('inc.home.product-details')
                    </div>
                    @empty
                    <div class="col-span-full sm:col-span-1">
                        <p>Nothing Found</p>
                    </div>
                    @endforelse
                </div>
                <span class=" mb-8 flex justify-center">{{ $products->links() }}</span>
            </div>

        </div>
    </x-container>

</x-layouts.app>