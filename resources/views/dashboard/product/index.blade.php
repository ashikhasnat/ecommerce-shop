<x-layouts.dashboard>
    <div class=" px-3 sm:px-14 text-right flex justify-between my-4 ">
        <h1 class=" font-semibold text-lg sm:text-3xl">Products</h1>
        <a href="{{ route('product.create') }}"
            class="text-indigo-600 text-xs sm:text-base border border-indigo-600 px-2 sm:px-6 py-1 sm:py-2 hover:opacity-75">Create
            New product</a>
    </div>
    @include('inc.session-msgs')
    <div class="flex flex-col px-4 mb-6">
        {{-- <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"> --}}
        <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="lg:text-center">
                            <th scope="col">Product ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Avg Ratings</th>
                            <th scope="col">Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    @foreach ($products as $product)
                    <tbody class="">
                        <tr class="lg:text-center">
                            <td data-label="Product ID">{{ $product->sku  }}</td>
                            <td data-label="Title">{{ $product->title  }}</td>
                            <td data-label="Avg Ratings">{{ $product->AvgRating  }}</td>
                            <td data-label="Category">{{ $product->category->name  }}</td>
                            <td data-label="Brand">{{ $product->brand->name  }}</td>
                            <td data-label="Availability"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $product->stock_status == 0 ? 'bg-red-100' : 'bg-green-100' }}
                                 text-green-800">
                                    @if ($product->stock_status == 0)
                                    <p class="text-red-500"><i class="fas fa-exclamation-circle  mx-1"></i> Out Of
                                        Stock
                                    </p>
                                    @else
                                    <p class=""><i class="far fa-check-circle text-green-400 mx-1"></i> in
                                        Stock</p>
                                    @endif

                                </span></td>
                            <td data-label="Price">
                                <p v-text="convertToCurrency({{ $product->price }})"></p>
                            </td>
                            <td class=" flex items-center">
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900 mr-6">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class=" py-1 px-2 text-red-500 border hover:text-white hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <!-- More rows... -->
                    </tbody>
                    @endforeach
                </table>
                <section class="my-6 text-xs md:text-sm flex items-center justify-center">
                    {{ $products->onEachSide(0)->links() }}
                </section>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</x-layouts.dashboard>