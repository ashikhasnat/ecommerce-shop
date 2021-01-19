<x-layouts.dashboard>
    <div class="sm:px-14 text-right flex justify-between my-4 ">
        <h1 class=" font-semibold text-3xl">Products</h1>
        <a href="{{ route('product.create') }}"
            class="text-indigo-600 text-base border border-indigo-600 px-6 py-2 hover:opacity-75">Create
            New product</a>
    </div>
    @include('inc.session-msgs')
    <Product-Data-Table></Product-Data-Table>
    <div class="flex flex-col px-4 mb-6">
        {{-- <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"> --}}
        <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                                Product ID
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                                Title
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Avg Ratings
                            </th>

                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Brand
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Category
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Availability
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-center text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Price
                            </th>
                            <th class="px-3 py-3 bg-gray-50"></th>
                        </tr>
                    </thead>
                    @foreach ($products as $product)
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-3 py-4 whitespace-no-wrap">
                                <div class="text-xs break-words leading-5 text-gray-900">
                                    {{ $product->sku  }}
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="text-xs leading-5 font-medium text-gray-900">
                                        {{ $product->title }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-no-wrap text-center">
                                <div class="text-xs break-words leading-5 text-gray-900">
                                    {{ $product->AvgRating }}
                                </div>
                            </td>

                            {{-- Brand --}}
                            <td class="px-3 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{ $product->brand->name }}
                            </td>
                            {{-- category --}}
                            <td class="px-3 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{ $product->category->name }}
                            </td>
                            <td class="px-3 py-4 whitespace-no-wrap">
                                {{-- Stock --}}
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
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

                                </span>
                            </td>
                            {{-- price --}}
                            <td class="text-sm leading-5 text-gray-600 ">
                                <p class="bg-orange-100 text-center" v-text="convertToCurrency({{ $product->price }})">
                                </p>
                            </td>

                            <td class="px-3 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                            <td class="px-3 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
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
                <section class="my-6 text-sm">
                    {{ $products->links() }}
                </section>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</x-layouts.dashboard>