<x-layouts.dashboard>
    <div class="px-12 text-right flex justify-between mb-4 mt-6">
        <h1 class=" font-semibold text-3xl">Sliders</h1>
        <a href="{{ route('slider.create') }}"
            class="text-base border text-indigo-600 border-indigo-600 px-6 py-2 hover:opacity-75">Add
            Slider</a>
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
                                Thumbnail
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                                Title
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Category
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Brand
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($sliders as $slider)
                        <tr>
                            <td data-label="Logo" class="px-3 py-4 whitespace-no-wrap">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{ $slider->thumbnail  }}" alt="Logo">
                                </div>
                            </td>
                            <td data-label="Name" class="px-3 py-4 whitespace-no-wrap">
                                {{ $slider->title }}
                            </td>
                            <td data-label="Total Products" class="px-3 py-4 whitespace-no-wrap">
                                <div class="text-xs break-words leading-5 text-gray-900">
                                    {{ $slider->category->name }}
                                </div>
                            </td>
                            <td data-label="Created At" class="px-3 py-4 whitespace-no-wrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $slider->brand->name }}
                                </span>
                            </td>
                            <td
                                class="px-2 flex items-center py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <a href="{{ route('slider.edit', $slider->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="ml-4 py-1 px-2 text-red-500 border hover:text-white hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                    </tbody>
                    <p>Empty</p>
                    @endforelse
                </table>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</x-layouts.dashboard>