<x-layouts.dashboard>
    <section style="width: 700px" class="mx-auto mt-8">
        @include('inc.session-msgs')
        <form action="{{ route('category.update', $category->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="block">
                <label for="name" class="text-base font-medium leading-5 text-gray-700">Update
                    Category</label>
                <input id="name" name="name" value="{{ $category->name }}"
                    class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                @error('name')
                <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="py-2 px-4 text-base leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                    Update
                </button>
            </div>
        </form>
    </section>
</x-layouts.dashboard>