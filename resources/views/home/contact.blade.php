<x-layouts.app>
    @section('title')
    Contact Us
    @endsection
    <x-container>
        @if (session('msg'))
        <Toastr text_msg="{{ session('msg') }}" text_classes="success"></Toastr>
        @endif
        <div class="w-3/4 mx-auto mt-6">
            <h1 class="text-2xl font-semibold mb-4">Contact Information</h1>
            <div class=" grid grid-cols-3 mb-10 mt-6">
                <div class="">
                    <h1 class=" font-semibold mb-2">Address</h1>
                    <h3> 60, 29th Street, San Francisco,</h3>
                    <p>CA 94110, United States.</p>
                </div>
                <div class="">
                    <h1 class=" font-semibold mb-2">Phone</h1>
                    <h3><a href="tel:+ 1 001 234 5678">+ 1 001 234 5678</a></h3>
                    <p>Call us anytime</p>
                </div>
                <div class="">
                    <h1 class=" font-semibold mb-2">Email</h1>
                    <h3><a href="mailto:support@domain.com"> support@domain.com</a></h3>
                    <p>Send us your query anytime!</p>
                </div>
            </div>
            <h1 class="text-2xl font-semibold mb-4">Contact Us</h1>
            <form action="{{ route('contact-us.store') }}" method="post">
                @csrf
                <div class="flex">
                    <div class="flex-1 mr-3">
                        <label for="name" class="text-base font-medium leading-5 text-gray-700">Name</label>
                        <input id="name" name="name" value="{{ old('name') }}"
                            class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                    <div class="flex-1 ml-3">
                        <label for="email" class="text-base font-medium leading-5 text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>
                <div class=" mt-4">
                    <label for="name" class="text-base font-medium leading-5 text-gray-700">Message</label>
                    <textarea name="message"
                        class="border p-3 opacity-75 w-full h-40 focus:outline-none rounded-md shadow-sm " id="message"
                        placeholder="Your Message*">{{ old('message') }}</textarea>
                </div>
                <div class="py-3 text-right">
                    <button type="submit"
                        class="py-2 px-4 text-base leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                        Send
                    </button>
                </div>
                @if ($errors->any())
                <div class=" text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </form>
        </div>
    </x-container>

</x-layouts.app>