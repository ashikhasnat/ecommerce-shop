<x-account>
    <div class="">
        <form action="{{ route('account-details-update', auth()->id()) }}" method="post">
            @csrf
            @method('PATCH')
            <div class=" mb-3">
                <label for="name">Name</label>
                <input class=" w-full border focus:outline-none py-1 px-3 mt-1" type="text"
                    value="{{ auth()->user()->name }}" name="name">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input value="{{ auth()->user()->email }}" class=" w-full border focus:outline-none py-1 px-3 mt-1"
                    type="email" name="email">
            </div>
            <button type="submit" class=" focus:outline-none py-2 mt-2 px-5 bg-gray-800 text-white">Update
                Details</button>
        </form>
        @if ($errors->any())
        <div class=" text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</x-account>