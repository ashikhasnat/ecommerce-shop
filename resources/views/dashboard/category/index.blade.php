<x-layouts.dashboard>
    <div class="px-12 text-right flex justify-between mb-4 mt-6">
        <h1 class=" font-semibold text-3xl">Categories</h1>
        <a href="{{ route('category.create') }}"
            class="text-base border text-indigo-600 border-indigo-600 px-6 py-2 hover:opacity-75">Create
            New Category</a>
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
                                    class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                    Total Product
                                </th>
                                <th
                                    class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                    Created At
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($categories as $cat)
                            <tr>
                                <td data-label="Name" class="px-3 py-4 whitespace-no-wrap">
                                    {{ $cat->name }}
                                </td>
                                <td data-label="Total Products" class="px-3 py-4 whitespace-no-wrap">
                                    <div class="text-xs break-words leading-5 text-gray-900">
                                        {{ $cat->products->count() }}
                                    </div>
                                </td>
                                <td data-label="Created At" class="px-3 py-4 whitespace-no-wrap">
                                    {{-- created at --}}
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $cat->created_at->format('F j, Y') }}
                                    </span>
                                </td>
                                <td class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('category.edit', $cat->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('category.destroy', $cat->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class=" py-1 px-2 text-red-500 border hover:text-white hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{--
        </div> --}}
    </div>
</x-layouts.dashboard>