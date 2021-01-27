<x-layouts.dashboard>
    <div class="px-12 text-right flex justify-between mb-4 mt-6">
        <h1 class=" font-semibold text-3xl">SubCategories</h1>
        <a href="{{ route('subcategory.create') }}"
            class="text-base border text-indigo-600 border-indigo-600 px-6 py-2 hover:opacity-75">Create
            New subCategory</a>
    </div>
    @include('inc.session-msgs')
    <div class="flex flex-col mb-6">
        {{-- <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"> --}}
        <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                                Category Name
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Total Product
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Created At
                            </th>
                        </tr>
                    </thead>
                    @foreach ($subcategories as $subCat)
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td data-label="Name" class="px-3 py-4 whitespace-no-wrap">
                                {{ $subCat->name }}
                            </td>
                            <td data-label="Category Name" class="px-3 py-4 whitespace-no-wrap">
                                <div
                                    class="text-xs inline-flex px-2 rounded break-words bg-yellow-200 leading-5 text-gray-900">
                                    {{ $subCat->category->name }}
                                </div>
                            </td>
                            <td data-label="Total Products" class="px-3 py-4 whitespace-no-wrap">
                                <div class="text-xs break-words leading-5 text-gray-900">
                                    {{ $subCat->products->count() }}
                                </div>
                            </td>
                            <td data-label="Created At" class="px-3 py-4 whitespace-no-wrap">
                                {{-- created at --}}
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $subCat->created_at->format('F j, Y') }}
                                </span>
                            </td>
                            <td class="px-2 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <a href="{{ route('subcategory.edit', $subCat->id) }}"
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