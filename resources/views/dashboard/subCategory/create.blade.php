<x-layouts.dashboard>
    <section style="width: 700px" class="mx-auto mt-8">
        @include('inc.session-msgs')

        <form action="{{ route('subcategory.store') }}" method="post">
            @csrf
            <div class="mb-16">
                <label for="category_id" class="text-base font-medium leading-5 text-gray-700">All Categories</label>
                <select id="category_id" name="category_id"
                    class="mt-1 form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-base sm:leading-5">
                    @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="block">
                <label for="name" class="text-base font-medium leading-5 text-gray-700">Add New
                    Category</label>
                <input id="name" name="name" value="{{ old('name') }}"
                    class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                @error('name')
                <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="py-2 px-4 text-base leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                    Create
                </button>
            </div>
        </form>
    </section>
</x-layouts.dashboard>