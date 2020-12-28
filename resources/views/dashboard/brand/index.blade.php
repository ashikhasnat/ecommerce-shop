<x-layouts.dashboard>
    <div class="px-12 text-right flex items-center justify-between mb-4 mt-4">
        <h1 class=" font-semibold text-3xl">Brands</h1>
        <a href="{{ route('brand.create') }}"
            class="text-base border text-indigo-600 border-indigo-600 px-6 py-2 hover:opacity-75">Create
            New brand</a>
    </div>
    @include('inc.session-msgs')
    <div class="flex flex-col mb-6">
        {{-- <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"> --}}
        <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-8">
            <div class="shadow overflow-hidden px-2 border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                                Logo
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-3 py-3 text-center bg-gray-50 text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Total Product
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Created At
                            </th>
                        </tr>
                    </thead>
                    @foreach ($brands as $brand)
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-3 py-4 whitespace-no-wrap">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{ $brand->brand_logo  }}" alt="Logo">
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="text-xs leading-5 font-medium text-gray-900">
                                        {{ $brand->name }}
                                    </div>
                                </div>
                            </td>

                            <td class="px-3 py-4 whitespace-no-wrap text-center">
                                <div class="text-xs break-words leading-5 text-gray-900">
                                    {{ $brand->products->count() }}
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-no-wrap">
                                {{-- created at --}}
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $brand->created_at->format('F j, Y') }}
                                </span>
                            </td>
                            <td class="px-2 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <a href="{{ route('brand.edit', $brand->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</x-layouts.dashboard>